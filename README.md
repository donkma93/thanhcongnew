# Thành Công Edu

Website giới thiệu dịch vụ tư vấn du học và quản trị nội dung cho Thành Công Edu, được xây dựng bằng Laravel 10, Blade, Tailwind CSS và Vite.

## Tổng quan

Project gồm 2 phần chính:

- Website public để giới thiệu dịch vụ, đăng tin tức và nhận đăng ký tư vấn
- Khu vực quản trị để quản lý bài viết, danh mục, đối tác, nội dung trang chủ, cài đặt hệ thống và danh sách đăng ký tư vấn

## Tính năng chính

### Website public

- Trang chủ giới thiệu thương hiệu và nội dung nổi bật
- Danh sách tin tức tại `/tin-tuc`
- Chi tiết bài viết theo slug
- Form đăng ký tư vấn trực tuyến

### Khu vực quản trị

- Đăng nhập quản trị
- Dashboard theo phong cách AdminLTE
- Quản lý tài khoản người dùng theo vai trò
- Quản lý danh mục bài viết
- Quản lý bài viết và ảnh đại diện
- Quản lý đối tác
- Quản lý cài đặt website
- Quản lý nội dung trang chủ
- Theo dõi danh sách đăng ký tư vấn

## Công nghệ sử dụng

- PHP `^8.1`
- Laravel `^10.10`
- MySQL hoặc MariaDB
- Blade Template
- Tailwind CSS
- Vite
- CKEditor 5
- AOS
- Swiper

## Cấu trúc route chính

- `/` : Trang chủ
- `/tin-tuc` : Danh sách bài viết
- `/tin-tuc/{slug}` : Chi tiết bài viết
- `/login` : Đăng nhập quản trị
- `/admin` : Dashboard quản trị

## Yêu cầu môi trường

- PHP 8.1 trở lên
- Composer
- Node.js 18 trở lên
- NPM
- MySQL hoặc MariaDB

## Cài đặt project

### 1. Clone source

```bash
git clone https://github.com/donkma93/thanhcongnew.git
cd thanhcongnew
```

### 2. Cài đặt dependency PHP

```bash
composer install
```

### 3. Cài đặt dependency frontend

```bash
npm install
```

### 4. Tạo file môi trường

```bash
cp .env.example .env
```

Trên Windows có thể copy thủ công từ `.env.example` sang `.env`.

### 5. Cấu hình môi trường

Cập nhật các biến trong `.env`, đặc biệt:

- `APP_NAME`
- `APP_URL`
- `DB_CONNECTION`
- `DB_HOST`
- `DB_PORT`
- `DB_DATABASE`
- `DB_USERNAME`
- `DB_PASSWORD`

### 6. Tạo app key

```bash
php artisan key:generate
```

### 7. Chạy migrate

```bash
php artisan migrate
```

### 8. Seed dữ liệu khởi tạo

```bash
php artisan db:seed
```

Seeder hiện tạo sẵn:

- 1 tài khoản quản trị mặc định
- các cài đặt hệ thống cơ bản

## Tài khoản admin mặc định

Sau khi chạy seed, bạn có thể đăng nhập bằng:

- Email: `admin@thanhcongedu.vn`
- Mật khẩu: `admin123456`

Nên đổi mật khẩu ngay sau khi triển khai.

## Chạy môi trường local

### Backend

```bash
php artisan serve
```

### Frontend dev server

```bash
npm run dev
```

### Build asset production

```bash
npm run build
```

## Kiểm thử

Chạy test:

```bash
php artisan test
```

## Thư mục quan trọng

- `app/Http/Controllers` : Controller xử lý nghiệp vụ
- `app/Models` : Model Eloquent
- `resources/views` : Giao diện Blade
- `resources/views/admin` : Giao diện quản trị
- `database/migrations` : Cấu trúc database
- `database/seeders` : Seeder dữ liệu khởi tạo
- `routes/web.php` : Route web chính

## Lưu ý triển khai

- Không commit file `.env`
- Không commit `vendor` và `node_modules`
- Cần chạy `npm run build` khi deploy production
- Nếu dùng upload ảnh local, cần tạo symbolic link storage:

```bash
php artisan storage:link
```

## Bản quyền

Project thuộc phạm vi sử dụng của Thành Công Edu.
