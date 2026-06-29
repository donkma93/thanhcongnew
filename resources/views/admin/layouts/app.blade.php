<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Quản trị') - Thành Công Edu Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkR4j8CsMCPiyVxV/2onh+YFSve+xhR5XKZw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --admin-body-bg: #f4f6f9;
            --admin-sidebar-bg: #343a40;
            --admin-sidebar-accent: #3f6791;
            --admin-navbar-bg: #ffffff;
            --admin-card-bg: #ffffff;
            --admin-border: #dee2e6;
            --admin-text: #212529;
            --admin-muted: #6c757d;
            --admin-primary: #007bff;
            --admin-success: #28a745;
            --admin-warning: #f39c12;
            --admin-danger: #dc3545;
            --admin-info: #17a2b8;
            --admin-shadow: 0 0 1px rgba(0, 0, 0, 0.125), 0 1px 3px rgba(0, 0, 0, 0.2);
            --admin-radius: 0.375rem;
        }

        body.adminlte {
            margin: 0;
            font-family: 'Source Sans 3', sans-serif;
            background: var(--admin-body-bg);
            color: var(--admin-text);
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            font: inherit;
        }

        .wrapper {
            min-height: 100vh;
        }

        .main-header {
            position: sticky;
            top: 0;
            z-index: 1040;
            background: var(--admin-navbar-bg);
            border-bottom: 1px solid var(--admin-border);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04);
        }

        .main-header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            min-height: 57px;
            padding: 0 1.25rem;
        }

        .header-start,
        .header-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .brand-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 800;
            letter-spacing: 0.02em;
        }

        .brand-logo {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 2rem;
            height: 2rem;
            border-radius: 0.5rem;
            background: linear-gradient(135deg, #007bff, #17a2b8);
            color: #fff;
            font-size: 0.95rem;
            font-weight: 800;
        }

        .header-link,
        .icon-button,
        .profile-button {
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            color: #495057;
            border-radius: 999px;
            padding: 0.55rem 0.8rem;
            transition: background 0.2s ease, color 0.2s ease;
        }

        .header-link:hover,
        .icon-button:hover,
        .profile-button:hover {
            background: #f1f3f5;
            color: #212529;
        }

        .icon-button {
            position: relative;
            justify-content: center;
            width: 2.6rem;
            height: 2.6rem;
            padding: 0;
            border: 0;
            background: transparent;
            cursor: pointer;
        }

        .icon-button svg,
        .notification-title svg,
        .dropdown-item-icon svg {
            width: 1.2rem;
            height: 1.2rem;
        }

        .notification-badge {
            position: absolute;
            top: 0.2rem;
            right: 0.2rem;
            min-width: 1.15rem;
            height: 1.15rem;
            border-radius: 999px;
            background: var(--admin-danger);
            color: #fff;
            font-size: 0.72rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0 0.2rem;
        }

        .topbar-menu {
            display: flex;
            align-items: center;
            gap: 0.35rem;
        }

        .dropdown {
            position: relative;
        }

        .dropdown-menu {
            position: absolute;
            top: calc(100% + 0.55rem);
            right: 0;
            min-width: 280px;
            background: #fff;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.75rem;
            box-shadow: 0 12px 26px rgba(0, 0, 0, 0.12);
            padding: 0.4rem;
            opacity: 0;
            visibility: hidden;
            transform: translateY(6px);
            transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s ease;
        }

        .dropdown:hover .dropdown-menu,
        .dropdown:focus-within .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.75rem 0.9rem 0.6rem;
            color: #495057;
            font-size: 0.88rem;
            font-weight: 700;
            border-bottom: 1px solid #edf0f2;
        }

        .notification-title {
            display: flex;
            align-items: center;
            gap: 0.55rem;
        }

        .notification-title svg {
            color: var(--admin-primary);
        }

        .notification-read-link {
            border: 0;
            background: transparent;
            color: var(--admin-primary);
            font-size: 0.82rem;
            font-weight: 700;
            cursor: pointer;
            padding: 0;
        }

        .notification-read-link:hover {
            text-decoration: underline;
        }

        .notification-read-link[disabled] {
            color: #9ca3af;
            cursor: default;
            text-decoration: none;
        }

        .dropdown-item {
            display: flex;
            gap: 0.75rem;
            align-items: flex-start;
            padding: 0.75rem 0.9rem;
            border-radius: 0.6rem;
        }

        .dropdown-item:hover {
            background: #f8f9fa;
        }

        .dropdown-item-icon {
            width: 2rem;
            height: 2rem;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            flex: 0 0 auto;
        }

        .dropdown-item-copy {
            min-width: 0;
        }

        .dropdown-item-copy strong {
            display: block;
            font-size: 0.95rem;
        }

        .dropdown-item-copy span {
            display: block;
            color: var(--admin-muted);
            font-size: 0.87rem;
            margin-top: 0.15rem;
            line-height: 1.45;
        }

        .notification-empty {
            display: none;
            padding: 1rem 0.9rem;
            color: var(--admin-muted);
            text-align: center;
            font-size: 0.92rem;
        }

        .profile-button {
            padding-right: 0.95rem;
        }

        .profile-avatar {
            width: 2.35rem;
            height: 2.35rem;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            color: #fff;
            background: linear-gradient(135deg, #17a2b8, #007bff);
        }

        .profile-copy {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
        }

        .profile-copy strong {
            font-size: 0.94rem;
        }

        .profile-copy span {
            color: var(--admin-muted);
            font-size: 0.82rem;
            margin-top: 0.15rem;
        }

        .profile-actions {
            padding: 0.45rem;
        }

        .profile-link {
            display: flex;
            align-items: center;
            gap: 0.7rem;
            padding: 0.8rem 0.9rem;
            border-radius: 0.6rem;
            color: #343a40;
        }

        .profile-link:hover {
            background: #f8f9fa;
        }

        .profile-link i {
            width: 1rem;
            text-align: center;
            color: var(--admin-muted);
        }

        .logout-button {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 0.7rem;
            padding: 0.8rem 0.9rem;
            border-radius: 0.6rem;
            border: 0;
            background: transparent;
            color: var(--admin-danger);
            cursor: pointer;
        }

        .logout-button:hover {
            background: #fff5f5;
        }

        .layout-shell {
            display: flex;
            min-height: calc(100vh - 57px);
        }

        .main-sidebar {
            width: 280px;
            background: var(--admin-sidebar-bg);
            color: rgba(255, 255, 255, 0.92);
            box-shadow: inset -1px 0 0 rgba(255, 255, 255, 0.04);
        }

        .sidebar {
            position: sticky;
            top: 57px;
            height: calc(100vh - 57px);
            overflow-y: auto;
            padding: 1rem 0.85rem 1.25rem;
        }

        .user-panel {
            display: flex;
            align-items: center;
            gap: 0.9rem;
            padding: 0.75rem 0.9rem 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            margin-bottom: 0.85rem;
        }

        .user-avatar {
            width: 2.75rem;
            height: 2.75rem;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.12);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
        }

        .nav-header {
            padding: 0.9rem 0.9rem 0.5rem;
            font-size: 0.78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: rgba(255, 255, 255, 0.45);
        }

        .nav-sidebar {
            display: flex;
            flex-direction: column;
            gap: 0.2rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            border-radius: var(--admin-radius);
            color: rgba(255, 255, 255, 0.84);
            padding: 0.72rem 0.9rem;
            transition: background 0.2s ease, color 0.2s ease, transform 0.2s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            background: var(--admin-sidebar-accent);
            color: #fff;
            transform: translateX(2px);
        }

        .nav-icon {
            width: 2rem;
            height: 2rem;
            border-radius: 0.6rem;
            background: rgba(255, 255, 255, 0.08);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.95rem;
            flex: 0 0 auto;
            transition: background 0.2s ease, color 0.2s ease;
        }

        .nav-icon i {
            font-size: 0.95rem;
        }

        .nav-link:hover .nav-icon,
        .nav-link.active .nav-icon {
            background: rgba(255, 255, 255, 0.18);
            color: #fff;
        }

        .content-wrapper {
            flex: 1;
            min-width: 0;
        }

        .content-header {
            padding: 1.25rem 1.5rem 0;
        }

        .content {
            padding: 1rem 1.5rem 1.5rem;
        }

        .page-heading {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
            margin-bottom: 1rem;
        }

        .page-pretitle {
            color: var(--admin-primary);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-size: 0.8rem;
            margin: 0 0 0.2rem;
        }

        .page-title {
            margin: 0;
            font-size: 1.75rem;
            font-weight: 700;
        }

        .page-subtitle {
            margin: 0.35rem 0 0;
            color: var(--admin-muted);
            font-size: 0.98rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.45rem;
            border: 1px solid transparent;
            border-radius: var(--admin-radius);
            padding: 0.625rem 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s ease, border-color 0.2s ease, color 0.2s ease;
        }

        .btn-primary {
            background: var(--admin-primary);
            border-color: var(--admin-primary);
            color: #fff;
        }

        .btn-primary:hover {
            background: #0069d9;
            border-color: #0062cc;
        }

        .btn-outline-primary {
            background: #fff;
            border-color: rgba(0, 123, 255, 0.25);
            color: var(--admin-primary);
        }

        .btn-outline-primary:hover {
            background: rgba(0, 123, 255, 0.08);
            border-color: rgba(0, 123, 255, 0.45);
        }

        .btn-default {
            background: #fff;
            border-color: #ced4da;
            color: #495057;
        }

        .btn-default:hover {
            background: #f8f9fa;
        }

        .btn-danger {
            background: var(--admin-danger);
            border-color: var(--admin-danger);
            color: #fff;
        }

        .btn-danger:hover {
            background: #c82333;
            border-color: #bd2130;
        }

        .alert {
            border-radius: var(--admin-radius);
            padding: 0.9rem 1rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }

        .grid {
            display: grid;
            gap: 1rem;
        }

        .grid-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .grid-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .grid-4 {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .grid-5 {
            grid-template-columns: repeat(5, minmax(0, 1fr));
        }

        .small-box {
            position: relative;
            display: block;
            border-radius: var(--admin-radius);
            color: #fff;
            overflow: hidden;
            box-shadow: var(--admin-shadow);
        }

        .small-box > .inner {
            padding: 1rem;
        }

        .small-box h3 {
            margin: 0;
            font-size: 2rem;
            font-weight: 800;
        }

        .small-box p {
            margin: 0.35rem 0 0;
            font-size: 1rem;
            opacity: 0.92;
        }

        .small-box .icon {
            position: absolute;
            right: 0.9rem;
            top: 0.7rem;
            font-size: 3rem;
            opacity: 0.2;
        }

        .small-box-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.65rem 1rem;
            background: rgba(0, 0, 0, 0.12);
            color: #fff;
            font-size: 0.92rem;
            font-weight: 700;
        }

        .bg-info { background: linear-gradient(135deg, #17a2b8, #138496); }
        .bg-success { background: linear-gradient(135deg, #28a745, #1e7e34); }
        .bg-warning { background: linear-gradient(135deg, #f39c12, #d58512); }
        .bg-danger { background: linear-gradient(135deg, #dc3545, #bd2130); }
        .bg-primary { background: linear-gradient(135deg, #007bff, #0056b3); }

        .card {
            background: var(--admin-card-bg);
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: var(--admin-radius);
            box-shadow: var(--admin-shadow);
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 0.9rem 1rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        }

        .card-header-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .card-title {
            margin: 0;
            font-size: 1.15rem;
            font-weight: 700;
        }

        .card-subtitle {
            margin: 0.25rem 0 0;
            color: var(--admin-muted);
            font-size: 0.92rem;
        }

        .card-body {
            padding: 1rem;
        }

        .quick-link {
            display: block;
            padding: 1rem;
            border: 1px solid var(--admin-border);
            border-radius: var(--admin-radius);
            background: #fff;
            transition: transform 0.15s ease, box-shadow 0.15s ease, border-color 0.15s ease;
        }

        .quick-link:hover {
            transform: translateY(-2px);
            box-shadow: var(--admin-shadow);
            border-color: #b8daff;
        }

        .quick-link-title {
            margin: 0;
            font-size: 1.05rem;
            font-weight: 700;
        }

        .quick-link-copy {
            margin: 0.45rem 0 0;
            color: var(--admin-muted);
            line-height: 1.5;
        }

        .info-box {
            display: flex;
            min-height: 90px;
            border-radius: var(--admin-radius);
            overflow: hidden;
            background: #fff;
            border: 1px solid rgba(0, 0, 0, 0.125);
            box-shadow: var(--admin-shadow);
        }

        .info-box-icon {
            width: 90px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.8rem;
        }

        .info-box-content {
            flex: 1;
            padding: 0.85rem 1rem;
        }

        .info-box-text {
            display: block;
            color: var(--admin-muted);
            font-size: 0.92rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .info-box-number {
            display: block;
            margin-top: 0.45rem;
            font-size: 1.65rem;
            font-weight: 800;
        }

        .admin-form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
        }

        .form-group-full {
            grid-column: 1 / -1;
        }

        .form-label {
            font-size: 0.95rem;
            font-weight: 700;
            color: #495057;
        }

        .form-control,
        .form-select {
            width: 100%;
            border: 1px solid #ced4da;
            border-radius: var(--admin-radius);
            padding: 0.7rem 0.85rem;
            font: inherit;
            background: #fff;
            color: var(--admin-text);
            box-sizing: border-box;
        }

        .form-control:focus,
        .form-select:focus {
            outline: none;
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 0.55rem;
            font-weight: 600;
            color: #495057;
        }

        .form-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .stack {
            display: flex;
            flex-direction: column;
            gap: 0.9rem;
        }

        .entity-list {
            display: flex;
            flex-direction: column;
            gap: 0.85rem;
            max-height: 720px;
            overflow: auto;
        }

        .entity-item {
            border: 1px solid var(--admin-border);
            border-radius: var(--admin-radius);
            padding: 1rem;
            background: #fff;
        }

        .table-wrap {
            overflow: auto;
            border: 1px solid var(--admin-border);
            border-radius: var(--admin-radius);
            background: #fff;
        }

        .admin-table {
            width: 100%;
            min-width: 880px;
            border-collapse: collapse;
        }

        .admin-table th,
        .admin-table td {
            padding: 0.9rem 1rem;
            border-bottom: 1px solid #edf0f2;
            vertical-align: top;
            text-align: left;
        }

        .admin-table th {
            background: #f8fafc;
            color: #495057;
            font-size: 0.78rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            white-space: nowrap;
        }

        .admin-table tbody tr:hover > td {
            background: #fcfdff;
        }

        .admin-table tbody tr:last-child td {
            border-bottom: 0;
        }

        .table-summary {
            color: var(--admin-muted);
            font-size: 0.92rem;
            line-height: 1.55;
        }

        .table-title {
            font-weight: 700;
            color: var(--admin-text);
        }

        .table-meta {
            color: var(--admin-muted);
            font-size: 0.88rem;
            margin-top: 0.2rem;
        }

        .table-media {
            width: 64px;
            height: 64px;
            object-fit: cover;
            border-radius: 0.75rem;
            border: 1px solid #dee2e6;
            background: #fff;
        }

        .table-avatar {
            width: 3.4rem;
            height: 3.4rem;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            background: #eef4ff;
            color: #1d4ed8;
            border: 1px solid #dbeafe;
        }

        .table-actions {
            display: flex;
            align-items: center;
            gap: 0.55rem;
            flex-wrap: wrap;
        }

        .form-table {
            width: 100%;
            border-collapse: collapse;
        }

        .form-table th,
        .form-table td {
            padding: 1rem;
            border-bottom: 1px solid #edf0f2;
            vertical-align: top;
            text-align: left;
        }

        .form-table th {
            width: 240px;
            background: #f8fafc;
            color: #334155;
            font-size: 0.84rem;
            font-weight: 800;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .form-table tbody tr:last-child th,
        .form-table tbody tr:last-child td {
            border-bottom: 0;
        }

        .form-table-note {
            margin-top: 0.4rem;
            color: var(--admin-muted);
            font-size: 0.88rem;
            line-height: 1.5;
        }

        .btn-sm {
            padding: 0.45rem 0.75rem;
            font-size: 0.86rem;
        }

        .table-toggle {
            cursor: pointer;
            font-weight: 700;
            color: #1d4ed8;
            border: 1px solid rgba(29, 78, 216, 0.18);
            background: rgba(219, 234, 254, 0.42);
            padding: 0.5rem 0.8rem;
            border-radius: 999px;
            font: inherit;
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            transition: background 0.2s ease, border-color 0.2s ease, color 0.2s ease;
        }

        .table-toggle:hover {
            background: rgba(191, 219, 254, 0.65);
            border-color: rgba(29, 78, 216, 0.3);
            color: #1e40af;
        }

        .entity-meta {
            color: var(--admin-muted);
            font-size: 0.9rem;
        }

        .entity-note {
            margin-top: 0.5rem;
            color: #495057;
            line-height: 1.55;
        }

        .entity-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0.75rem;
            flex-wrap: wrap;
            margin-top: 0.85rem;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            border-radius: 999px;
            padding: 0.3rem 0.65rem;
            font-size: 0.8rem;
            font-weight: 700;
        }

        .badge-info {
            background: rgba(23, 162, 184, 0.12);
            color: #117a8b;
        }

        .badge-success {
            background: rgba(40, 167, 69, 0.12);
            color: #1e7e34;
        }

        .badge-secondary {
            background: rgba(108, 117, 125, 0.12);
            color: #5a6268;
        }

        .media-thumb {
            width: 88px;
            height: 58px;
            object-fit: cover;
            border-radius: 0.3rem;
            border: 1px solid #dee2e6;
        }

        .text-link-danger {
            color: var(--admin-danger);
            font-weight: 700;
            background: none;
            border: 0;
            padding: 0;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
        }

        .text-link-danger:hover {
            text-decoration: underline;
        }

        .empty-state {
            padding: 1rem;
            border: 1px dashed #ced4da;
            border-radius: var(--admin-radius);
            color: var(--admin-muted);
            text-align: center;
            background: #fcfcfd;
        }

        .admin-modal {
            position: fixed;
            inset: 0;
            z-index: 1100;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .admin-modal[hidden] {
            display: none;
        }

        .admin-modal-backdrop {
            position: absolute;
            inset: 0;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(3px);
        }

        .admin-modal-dialog {
            position: relative;
            width: min(960px, 100%);
            max-height: calc(100vh - 3rem);
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 24px 60px rgba(15, 23, 42, 0.28);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .admin-modal-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 1rem;
            padding: 1.1rem 1.25rem;
            border-bottom: 1px solid #e9ecef;
        }

        .admin-modal-title {
            margin: 0;
            font-size: 1.2rem;
            font-weight: 700;
        }

        .admin-modal-subtitle {
            margin: 0.3rem 0 0;
            color: var(--admin-muted);
            font-size: 0.93rem;
            line-height: 1.55;
        }

        .admin-modal-close {
            width: 2.5rem;
            height: 2.5rem;
            padding: 0;
            border: 0;
            border-radius: 999px;
            background: #f3f4f6;
            color: #334155;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 auto;
            transition: background 0.2s ease, color 0.2s ease;
        }

        .admin-modal-close:hover {
            background: #e2e8f0;
            color: #0f172a;
        }

        .admin-modal-body {
            padding: 1.25rem;
            overflow: auto;
        }

        body.modal-open {
            overflow: hidden;
        }

        @media (max-width: 1199px) {
            .grid-5 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .grid-4 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 991px) {
            .main-header-inner,
            .header-start,
            .header-actions {
                flex-wrap: wrap;
            }

            .layout-shell {
                flex-direction: column;
            }

            .main-sidebar {
                width: 100%;
            }

            .sidebar {
                position: static;
                height: auto;
            }

            .admin-form-grid,
            .grid-3,
            .grid-4,
            .grid-5,
            .grid-2 {
                grid-template-columns: 1fr;
            }

            .content-header,
            .content {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .dropdown-menu {
                right: auto;
                left: 0;
            }

            .admin-modal {
                padding: 1rem;
            }

            .admin-modal-dialog {
                width: 100%;
                max-height: calc(100vh - 2rem);
            }

            .admin-modal-header,
            .admin-modal-body {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }
    </style>
    @stack('head')
</head>
<body class="adminlte">
    @php
        $roleLabels = [
            'admin' => 'Quản trị viên',
            'manager' => 'Quản lý',
            'editor' => 'Biên tập viên',
        ];

        $notificationItems = [
            [
                'iconClass' => 'bg-primary',
                'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg>',
                'title' => 'Tài khoản mới cần rà soát',
                'text' => 'Kiểm tra phân quyền và trạng thái hoạt động của người dùng mới.',
            ],
            [
                'iconClass' => 'bg-success',
                'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m5 13 4 4L19 7"></path></svg>',
                'title' => 'Nội dung đã sẵn sàng xuất bản',
                'text' => 'Duyệt nhanh các bài viết đã hoàn tất trước khi công khai.',
            ],
            [
                'iconClass' => 'bg-warning',
                'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path><path d="M8 9h8"></path><path d="M8 13h5"></path></svg>',
                'title' => 'Có đăng ký tư vấn mới',
                'text' => 'Theo dõi khách hàng tiềm năng và phản hồi sớm trong ngày.',
            ],
        ];
    @endphp

    <div class="wrapper">
        <header class="main-header">
            <div class="main-header-inner">
                <div class="header-start">
                    <a href="{{ route('admin.dashboard') }}" class="brand-link">
                        <span class="brand-logo">TC</span>
                        <span>Thành Công Edu Admin</span>
                    </a>
                    <a href="{{ route('home') }}" class="header-link">
                        <i class="fa-solid fa-globe"></i>
                        <span>Xem website</span>
                    </a>
                </div>

                <div class="header-actions">
                    <div class="topbar-menu">
                        <div class="dropdown">
                            <button type="button" class="icon-button" aria-label="Thông báo">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M15 17h5l-1.4-1.4A2 2 0 0 1 18 14.2V11a6 6 0 1 0-12 0v3.2a2 2 0 0 1-.6 1.4L4 17h5"></path>
                                    <path d="M9.5 17a2.5 2.5 0 0 0 5 0"></path>
                                </svg>
                                <span class="notification-badge" data-notification-badge>{{ count($notificationItems) }}</span>
                            </button>
                            <div class="dropdown-menu" data-notification-menu>
                                <div class="dropdown-title">
                                    <span class="notification-title">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                            <path d="M15 17h5l-1.4-1.4A2 2 0 0 1 18 14.2V11a6 6 0 1 0-12 0v3.2a2 2 0 0 1-.6 1.4L4 17h5"></path>
                                            <path d="M9.5 17a2.5 2.5 0 0 0 5 0"></path>
                                        </svg>
                                        <span>Thông báo</span>
                                    </span>
                                    <button type="button" class="notification-read-link" data-mark-read>Đánh dấu đã đọc</button>
                                </div>
                                <div data-notification-list>
                                    @foreach ($notificationItems as $item)
                                        <a href="{{ route('admin.dashboard') }}" class="dropdown-item">
                                            <span class="dropdown-item-icon {{ $item['iconClass'] }}">
                                                {!! $item['svg'] !!}
                                            </span>
                                            <span class="dropdown-item-copy">
                                                <strong>{{ $item['title'] }}</strong>
                                                <span>{{ $item['text'] }}</span>
                                            </span>
                                        </a>
                                    @endforeach
                                </div>
                                <div class="notification-empty" data-notification-empty>
                                    Không còn thông báo mới.
                                </div>
                            </div>
                        </div>

                        <div class="dropdown">
                            <button type="button" class="profile-button" aria-label="Tài khoản">
                                <span class="profile-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</span>
                                <span class="profile-copy">
                                    <strong>{{ auth()->user()->name ?? 'Admin' }}</strong>
                                    <span>{{ $roleLabels[auth()->user()->role ?? ''] ?? 'Quản trị' }}</span>
                                </span>
                                <i class="fa-solid fa-angle-down"></i>
                            </button>
                            <div class="dropdown-menu">
                                <div class="dropdown-title">
                                    <span>Tài khoản</span>
                                    <span>{{ $roleLabels[auth()->user()->role ?? ''] ?? 'Quản trị' }}</span>
                                </div>
                                <div class="profile-actions">
                                    <a href="{{ route('admin.users.index') }}" class="profile-link">
                                        <i class="fa-regular fa-id-card"></i>
                                        <span>Thông tin tài khoản</span>
                                    </a>
                                    <a href="{{ route('admin.settings.index') }}" class="profile-link">
                                        <i class="fa-solid fa-gear"></i>
                                        <span>Cài đặt hệ thống</span>
                                    </a>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="logout-button" type="submit">
                                            <i class="fa-solid fa-right-from-bracket"></i>
                                            <span>Đăng xuất</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="layout-shell">
            @include('admin.partials.sidebar')

            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const notificationStateKey = 'thanhcong_admin_notifications_read';
            const notificationBadge = document.querySelector('[data-notification-badge]');
            const notificationList = document.querySelector('[data-notification-list]');
            const notificationEmpty = document.querySelector('[data-notification-empty]');
            const markReadButton = document.querySelector('[data-mark-read]');
            const modalOpenButtons = document.querySelectorAll('[data-modal-open]');
            const modalCloseButtons = document.querySelectorAll('[data-modal-close]');
            const modalOverlays = document.querySelectorAll('[data-admin-modal]');

            function applyNotificationState(isRead) {
                if (!notificationBadge || !notificationList || !notificationEmpty || !markReadButton) {
                    return;
                }

                if (isRead) {
                    notificationBadge.textContent = '0';
                    notificationBadge.style.display = 'none';
                    notificationList.style.display = 'none';
                    notificationEmpty.style.display = 'block';
                    markReadButton.textContent = 'Đã đọc hết';
                    markReadButton.disabled = true;
                } else {
                    notificationBadge.style.display = 'inline-flex';
                    notificationList.style.display = 'block';
                    notificationEmpty.style.display = 'none';
                    markReadButton.textContent = 'Đánh dấu đã đọc';
                    markReadButton.disabled = false;
                }
            }

            const storedNotificationState = window.localStorage.getItem(notificationStateKey) === '1';
            applyNotificationState(storedNotificationState);

            if (markReadButton) {
                markReadButton.addEventListener('click', function () {
                    window.localStorage.setItem(notificationStateKey, '1');
                    applyNotificationState(true);
                });
            }

            function setEditToggleContent(button, isOpen) {
                if (!button) {
                    return;
                }

                const iconClass = isOpen ? 'fa-solid fa-xmark' : 'fa-solid fa-pen-to-square';
                const label = isOpen ? 'Đóng' : 'Sửa';

                button.innerHTML = '<i class="' + iconClass + '"></i><span>' + label + '</span>';
            }

            function setBodyModalState() {
                const hasOpenModal = Array.from(modalOverlays).some(function (modal) {
                    return !modal.hasAttribute('hidden');
                });

                document.body.classList.toggle('modal-open', hasOpenModal);
            }

            function openModal(modalId) {
                const modal = modalId ? document.getElementById(modalId) : null;

                if (!modal) {
                    return;
                }

                modal.removeAttribute('hidden');
                setBodyModalState();
            }

            function closeModal(modal) {
                if (!modal) {
                    return;
                }

                modal.setAttribute('hidden', 'hidden');
                setBodyModalState();
            }

            modalOpenButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    openModal(button.getAttribute('data-modal-open'));
                });
            });

            modalCloseButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    closeModal(button.closest('[data-admin-modal]'));
                });
            });

            modalOverlays.forEach(function (modal) {
                modal.addEventListener('click', function (event) {
                    if (event.target === modal || event.target.hasAttribute('data-modal-backdrop')) {
                        closeModal(modal);
                    }
                });

                if (modal.dataset.modalAutoOpen === 'true') {
                    openModal(modal.id);
                }
            });

            document.addEventListener('keydown', function (event) {
                if (event.key !== 'Escape') {
                    return;
                }

                const openModalElement = Array.from(modalOverlays).find(function (modal) {
                    return !modal.hasAttribute('hidden');
                });

                closeModal(openModalElement);
            });

            document.querySelectorAll('.rich-editor').forEach(function (element) {
                if (element.dataset.editorReady === 'true') {
                    return;
                }

                ClassicEditor.create(element, {
                    toolbar: [
                        'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList',
                        '|', 'blockQuote', 'insertTable', 'undo', 'redo'
                    ]
                }).then(function () {
                    element.dataset.editorReady = 'true';
                }).catch(function (error) {
                    console.error(error);
                });
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
