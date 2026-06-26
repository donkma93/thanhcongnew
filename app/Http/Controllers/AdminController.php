<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Consultation;
use App\Models\Partner;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'counts' => $this->counts(),
            'consultations' => Consultation::latest()->take(10)->get(),
        ]);
    }

    public function users()
    {
        $this->authorizeRoles('admin');
        return view('admin.users.index', [
            'counts' => $this->counts(),
            'users' => User::latest()->get(),
        ]);
    }

    public function categories()
    {
        $this->authorizeRoles('admin', 'manager');
        return view('admin.categories.index', [
            'counts' => $this->counts(),
            'categories' => Category::withCount('articles')->latest()->get(),
        ]);
    }

    public function articles()
    {
        $this->authorizeRoles('admin', 'manager', 'editor');
        return view('admin.articles.index', [
            'counts' => $this->counts(),
            'categories' => Category::orderBy('name')->get(),
            'articles' => Article::with('category')->latest()->get(),
        ]);
    }

    public function partners()
    {
        $this->authorizeRoles('admin', 'manager');
        return view('admin.partners.index', [
            'counts' => $this->counts(),
            'partners' => Partner::orderBy('sort_order')->latest()->get(),
        ]);
    }

    public function settings()
    {
        $this->authorizeRoles('admin');
        return view('admin.settings.index', [
            'counts' => $this->counts(),
            'settings' => Setting::orderBy('group')->orderBy('key')->get(),
            'homepage' => app(HomeController::class)->content(),
        ]);
    }

    public function consultations()
    {
        $this->authorizeRoles('admin', 'manager');
        return view('admin.consultations.index', [
            'counts' => $this->counts(),
            'consultations' => Consultation::latest()->get(),
        ]);
    }

    public function storeUser(Request $request)
    {
        $this->authorizeRoles('admin');
        $data = $this->validateUser($request);
        $data['password'] = Hash::make($data['password']);
        $data['is_active'] = $request->boolean('is_active', true);
        User::create($data);

        return back()->with('success', 'Đã thêm tài khoản mới.');
    }

    public function updateUser(Request $request, User $user)
    {
        $this->authorizeRoles('admin');
        $request->merge([
            'name' => $request->input('name', $user->name),
            'email' => $request->input('email', $user->email),
        ]);

        $data = $this->validateUser($request, $user);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $data['is_active'] = $request->boolean('is_active');
        $user->update($data);

        return back()->with('success', 'Đã cập nhật tài khoản.');
    }

    public function destroyUser(User $user)
    {
        $this->authorizeRoles('admin');

        if (auth()->id() === $user->id) {
            return back()->withErrors([
                'user' => 'Không thể xóa chính tài khoản đang đăng nhập.',
            ]);
        }

        $user->delete();

        return back()->with('success', 'Đã xóa tài khoản.');
    }

    public function storeCategory(Request $request)
    {
        $this->authorizeRoles('admin', 'manager');
        Category::create($this->categoryData($request));

        return back()->with('success', 'Đã thêm danh mục.');
    }

    public function updateCategory(Request $request, Category $category)
    {
        $this->authorizeRoles('admin', 'manager');
        $category->update($this->categoryData($request, $category));

        return back()->with('success', 'Đã cập nhật danh mục.');
    }

    public function destroyCategory(Category $category)
    {
        $this->authorizeRoles('admin', 'manager');
        $category->delete();

        return back()->with('success', 'Đã xóa danh mục.');
    }

    public function storeArticle(Request $request)
    {
        $this->authorizeRoles('admin', 'manager', 'editor');
        Article::create($this->articleData($request));

        return back()->with('success', 'Đã đăng bài viết.');
    }

    public function updateArticle(Request $request, Article $article)
    {
        $this->authorizeRoles('admin', 'manager', 'editor');
        $article->update($this->articleData($request, $article));

        return back()->with('success', 'Đã cập nhật bài viết.');
    }

    public function destroyArticle(Article $article)
    {
        $this->authorizeRoles('admin', 'manager');

        if ($article->thumbnail && !filter_var($article->thumbnail, FILTER_VALIDATE_URL)) {
            Storage::disk('public')->delete($article->thumbnail);
        }

        $article->delete();

        return back()->with('success', 'Đã xóa bài viết.');
    }

    public function storePartner(Request $request)
    {
        $this->authorizeRoles('admin', 'manager');
        Partner::create($this->partnerData($request));

        return back()->with('success', 'Đã thêm đối tác.');
    }

    public function updatePartner(Request $request, Partner $partner)
    {
        $this->authorizeRoles('admin', 'manager');
        $partner->update($this->partnerData($request, $partner));

        return back()->with('success', 'Đã cập nhật đối tác.');
    }

    public function destroyPartner(Partner $partner)
    {
        $this->authorizeRoles('admin', 'manager');

        if ($partner->logo && !filter_var($partner->logo, FILTER_VALIDATE_URL)) {
            Storage::disk('public')->delete($partner->logo);
        }

        $partner->delete();

        return back()->with('success', 'Đã xóa đối tác.');
    }

    public function updateSettings(Request $request)
    {
        $this->authorizeRoles('admin');
        $validated = $request->validate([
            'settings' => 'required|array',
            'settings.*' => 'nullable|string|max:5000',
        ]);

        foreach ($validated['settings'] as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'group' => 'general']
            );
        }

        Cache::forget('site_settings');

        return back()->with('success', 'Đã cập nhật cài đặt.');
    }

    public function updateHomepage(Request $request)
    {
        $this->authorizeRoles('admin');
        $validated = $request->validate([
            'hero_title' => 'required|string|max:1000',
            'hero_description' => 'required|string|max:1000',
            'stats_title' => 'required|string|max:1000',
            'stats_intro_1' => 'required|string|max:2000',
            'stats_intro_2' => 'required|string|max:2000',
            'stats_intro_3' => 'required|string|max:2000',
            'scholarship_subtitle' => 'required|string|max:1000',
            'scholarship_description' => 'required|string|max:2000',
            'testimonials_title' => 'required|string|max:1000',
            'programs_title' => 'required|string|max:1000',
            'news_title' => 'required|string|max:1000',
            'consultation_description' => 'required|string|max:1000',
        ]);

        Storage::put('homepage.json', json_encode($validated, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        Cache::forget('homepage_content');

        return back()->with('success', 'Đã cập nhật nội dung trang chủ.');
    }

    private function counts(): array
    {
        return [
            'users' => User::count(),
            'categories' => Category::count(),
            'articles' => Article::count(),
            'partners' => Partner::count(),
            'consultations' => Consultation::count(),
        ];
    }

    private function validateUser(Request $request, ?User $user = null): array
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => [$user ? 'nullable' : 'required', 'string', 'min:6'],
            'role' => 'required|in:admin,manager,editor',
            'is_active' => 'nullable|boolean',
        ]);
    }

    private function categoryData(Request $request, ?Category $category = null): array
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('categories')->ignore($category)],
            'description' => 'nullable|string|max:2000',
        ]);

        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);

        return $data;
    }

    private function articleData(Request $request, ?Article $article = null): array
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => ['nullable', 'string', 'max:255'],
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'nullable|string|max:2000',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'content' => 'required|string',
            'is_scholarship' => 'nullable|boolean',
            'status' => 'required|in:draft,published,hidden',
        ]);

        $data['slug'] = $this->uniqueSlug('articles', $data['slug'] ?: Str::slug($data['title']), $article?->id);
        $data['is_scholarship'] = $request->boolean('is_scholarship');
        $data['published_at'] = $data['status'] === 'published' ? now() : null;

        if ($request->hasFile('thumbnail')) {
            if ($article && $article->thumbnail && !filter_var($article->thumbnail, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete($article->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('uploads/articles', 'public');
        } elseif ($article) {
            $data['thumbnail'] = $article->thumbnail;
        }

        return $data;
    }

    private function authorizeRoles(string ...$roles): void
    {
        abort_unless(auth()->user()?->hasRole(...$roles), 403, 'Bạn không có quyền thực hiện thao tác này.');
    }

    private function uniqueSlug(string $table, string $slug, ?int $ignoreId = null): string
    {
        $baseSlug = $slug;
        $counter = 1;

        while ($this->slugExists($table, $slug, $ignoreId)) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    private function slugExists(string $table, string $slug, ?int $ignoreId = null): bool
    {
        $query = \DB::table($table)->where('slug', $slug);

        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }

        return $query->exists();
    }

    private function partnerData(Request $request, ?Partner $partner = null): array
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:4096',
            'website' => 'nullable|string|max:1000',
            'description' => 'nullable|string|max:2000',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('logo')) {
            if ($partner && $partner->logo && !filter_var($partner->logo, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete($partner->logo);
            }
            $data['logo'] = $request->file('logo')->store('uploads/partners', 'public');
        } elseif ($partner) {
            $data['logo'] = $partner->logo;
        }

        return $data;
    }
}
