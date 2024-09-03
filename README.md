# Hướng dẫn Thiết lập và Chạy Ứng dụng Todo List

## Yêu cầu hệ thống
- **PHP**: 8.1 trở lên
- **Composer**
- **Node.js** và **npm**
- **MySQL** hoặc **MariaDB**

## Các bước thiết lập

1. **Clone dự án**
    ```bash
    git clone https://github.com/anhanh03/dangnhapdangky.git
    ```
2. **Cài đặt dependencies PHP**
    ```bash
    composer install
    ```
3. **Cài đặt dependencies JavaScript**
    ```bash
    npm install
    ```
4. **Thiết lập môi trường**
   - Sao chép file `.env.example` thành `.env`
   - Cấu hình kết nối cơ sở dữ liệu trong file `.env`
   - Tạo key ứng dụng
5. **Chạy migration và seeder**
    ```bash
    php artisan migrate --seed
    ```
6. **Biên dịch assets**
    ```bash
    npm run dev
    ```
7. **Chạy ứng dụng**
   - Khởi động máy chủ Laravel
   ```bash
   php artisan serve
   ```
   - Mở trình duyệt
   - Truy cập [http://localhost:8000](http://localhost:8000)

## Tính năng chính
- 📝 Tạo, xem, cập nhật và xóa các mục todo
- 🔒 Xác thực người dùng
- 📊 Xuất danh sách todo ra file Excel
- ⏱️ Giới hạn tạo todo (3 giây/lần)

## Cấu trúc dự án
todo-list/
├── 📂 app/
│   ├── 📂 Http/
│   │   ├── 📂 Controllers/
│   │   └── 📂 Middleware/
│   └── 📂 Models/
├── 📂 database/
│   ├── 📂 migrations/
│   └── 📂 seeders/
├── 📂 resources/
│   ├── 📂 views/
│   └── 📂 js/
├── 📂 routes/
│   └── 📄 web.php
└── 📄 .env
## Hỗ trợ
Nếu bạn gặp bất kỳ vấn đề nào trong quá trình thiết lập hoặc chạy ứng dụng, vui lòng tạo issue trên GitHub hoặc liên hệ với chúng tôi qua email [anhanhvodoi03@gmail.com](mailto:anhanhvodoi03@gmail.com).

---

Chúc bạn có trải nghiệm tuyệt vời với ứng dụng Todo List của chúng tôi! 🚀✨