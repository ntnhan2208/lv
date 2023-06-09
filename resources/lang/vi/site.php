<?php

return [
    'admin' => [
        'confirm' => 'Bạn có muốn xoá?',
        'title' => 'Quản Lý Admin',
        'name' => 'Tên',
        'email' => 'Email',
        'password' => 'Mật Khẩu',
        'phone' => 'Số điện thoại',
        'image' => 'Hình đại diện',
        'personal_id' => 'CMND/CCCD',
        'gender' => 'Giới tính',
        'not_delete' => "Bạn không thể xoá vì tài khoản quản trị phải tồn tại ít nhất 1",
        'profile' => "Chỉnh sửa hồ sơ",
        'change_pass' => 'Thay đổi mật khẩu',
        'confirm_password' => 'Mật khẩu xác thực',
        'old_password' => 'Mật khẩu cũ',
        'new_password' => 'Mật khẩu mới',
        'validation' => [
            'name_not_empty' => 'Tên không được để trống',
            'email_exist' => 'Email này đã tồn tại',
            'email_regex' => 'Email không đúng định dạng',
            'email_not_empty' => 'Email không được để trống',
            'phone_not_empty' => 'Số điện thoại không được để trống',
            'phone_regex' => 'Số điện thoại không đúng định dạng',
            'phone_exist' => 'Số điện thoại đã tồn tại',
            'phone_min' => 'Số điện thoại phải có ít nhất 10 kí tự',
            'phone_max' => 'Số điện thoại không được vượt quá 10 kí tự',
            'personal_id_regex' => 'CMND/CCCD không đúng định dạng',
            'personal_id_not_empty' => 'CMND/CCCD không được để trống',
            'personal_id_exist' => 'CMND/CCCD đã tồn tại',
            'personal_id_max' => 'CMND/CCCD không được vượt quá 12 kí tự',
            'password_not_empty' => 'Mật khẩu không được để trống',
            'old_password_not_empty' => "Nhập vào mật khẩu cũ",
            'new_password_not_empty' => "Nhập vào mật khẩu mới",
            'confirm_password_not_empty' => "Nhập vào mật khẩu xác thực",
            'same_password' => 'Mật khẩu xác thực không giống'
        ],
        'role' => 'Quyền truy cập',
        'alias_not_empty' => 'Đường dẫn không được để trống!'
    ],
    'add' => 'Thêm mới',
    'book' => 'Đặt Căn hộ',
    'enable' => 'Cho phép',
    'disable' => 'Không cho phép',
    'yes' => 'Có',
    'no' => 'Không',
    'trash' => 'Thùng rác',
    'published_at' => 'Ngày hiển thị',
    'disabled_at' => 'Ngày tắt',
    'created_at' => 'Ngày tạo',
    'status' => 'Trạng thái',
    'status_show_home' => 'Hiển thị trang chủ',
    'status_lock' => 'Khóa',
    'status_comment' => 'Bình luận',
    'dashboard' => 'Bảng điều khiển',
    'icon' => 'Mã icon',
    'slug' => 'Đường dẫn',
    'button_add' => "Thêm mới",
    'button_book' => "Đặt Căn hộ",
    'button_update' => "Cập nhập",
    'button_choose' => "Chọn",
    'button_remove' => "Xóa",
    'reset' => "Huỷ bỏ",
    'logout' => "Thoát",
    'image' => "Hình ảnh",
    'configuration' => 'Cấu hình',
    'main_content' => 'Nội dung chính',
    'setting' => 'Cài đặt',
    'choose' => 'Chọn',
    'sort' => 'Sắp xếp',
    'settings' => [
        'title' => 'Cài đặt',
        'meta_tag' => "Meta Tag",
        'tracking_code' => "Mã theo dõi",
        'seo_note' => "Vui lòng nhập nội dung của tiêu đề, từ khóa, mô tả bởi vì nó hỗ trợ cho SEO",
        'seo_title' => "Title",
        'keyword' => "Thẻ Meta keywords",
        'description' => "Thẻ  description",
        'meta' => "Thẻ Meta khác",
        'logo' => "Logo",
        'favicon' => "Favicon",
        'main_setting' => "Cài đặt chung",
        'social' => "Mạng xã hội"
    ],
    'message' => [
        'update_success' => "Cập nhật thành công!",
        'add_success' => "Thêm mới thành công!",
        'delete_success' => "Xoá thành công!",
        'error' => "Có lỗi xảy ra!",
        'wrong_password' => 'Mật khẩu hiện tại không chính xác!'
    ],
    'role' => [
        'name' => 'Vai trò',
        'title' => "Vai trò trên trang",
        'warning_delete_exists_user' => "Không thể xóa vì có tài khoản đang sử dụng"
    ],
    'employee' => [
        'title' => 'Quản lý nhân viên môi giới',
        'name' => 'Tên nhân viên',
        'email' => 'Email',
        'image' => 'Hình ảnh',
        'position' => 'Chức vụ',
        'gender' => 'Giới tính',
        'phone' => 'Số điện thoại',
        'personal_id' => 'CMND/CCCD',
        'updated_by' => 'Cập nhật bởi',
        'validation' => [
            'name_not_empty' => "Tên không được để trống",
            'personal_id_regex' => 'CMND/CCCD không đúng định dạng',
            'personal_id_exist' => 'CMND/CCCD đã tồn tại',
            'personal_id_max' => 'CMND/CCCD không được vượt quá 10 kí tự',
            'personal_id_not_empty' => "CMND/CCCD không được để trống",
            'email_exist' => 'Email này đã tồn tại',
            'email_regex' => 'Email không đúng định dạng',
            'email_not_empty' => 'Email không được để trống',
            'phone_regex' => 'Số điện thoại không đúng định dạng',
            'phone_exist' => 'Số điện thoại đã tồn tại',
            'phone_min' => 'Số điện thoại phải có ít nhất 10 kí tự',
            'phone_max' => 'Số điện thoại không được vượt quá 10 kí tự',
            'position_not_empty' => 'Chức vụ không được để trống'
        ],
    ],
    'customer' => [
        'title' => 'Quản lý khách hàng',
        'name' => 'Tên khách hàng',
        'email' => 'Email',
        'phone' => 'Số điện thoại',
        'personal_id' => 'CMND/CCCD',
        'validation' => [
            'name_not_empty' => "Tên không được để trống",
            'personal_id_regex' => 'CMND/CCCD không đúng định dạng',
            'personal_id_exist' => 'CMND/CCCD đã tồn tại',
            'personal_id_not_empty' => "CMND/CCCD không được để trống",
            'personal_id_max' => "CMND/CCCD không được vượt quá 12 kí tự",
            'email_exist' => 'Email này đã tồn tại',
            'email_regex' => 'Email không đúng định dạng',
            'email_not_empty' => 'Email không được để trống',
            'phone_regex' => 'Số điện thoại không đúng định dạng',
            'phone_exist' => 'Số điện thoại đã tồn tại',
            'phone_min' => 'Số điện thoại phải có ít nhất 10 kí tự',
            'phone_max' => 'Số điện thoại không được vượt quá 10 kí tự',
            'phone_not_empty' => 'Số điện thoại không được để trống'

        ],
    ],
    'booking' => [
        'title' => 'Quản lý đặt Căn hộ',
        'bookings_not_paid' => 'Chưa thanh toán',
        'bookings_paid' => 'Đã thanh toán',
        'bookings_canceled' => 'Đã bị hủy',
        'name' => 'Tên khách hàng',
        'id' => 'Mã đơn',
        'phone' => 'Số điện thoại',
        'personal_id' => 'CMND/CCCD',
        'email' => 'Email',
        'request' => 'Yêu cầu',
        'date_start' => 'Ngày nhận',
        'date_end' => 'Ngày trả',
        'rooms' => 'Danh sách Căn hộ',
        'services' => 'Danh sách dịch vụ',
        'total' => 'Tổng giá',
        'total_room' => 'Tổng giá Căn hộ',
        'total_service' => 'Tổng giá dịch vụ',
        'paid' => 'Trạng thái thanh toán',
        'customer' => 'Khách thuê',
        'validation' => [
            'date_start_not_empty' => 'Ngày nhận Căn hộ không được để trống',
            'date_start_after' => 'Ngày nhận phải bắt đầu từ hôm nay',
            'date_end_not_empty' => 'Ngày trả Căn hộ không được để trống',
            'date_end_after' => 'Ngày trả Căn hộ phải sau ngày nhận Căn hộ',
        ]

    ],
    'request_booking' => [
        'title' => 'Yêu cầu đặt Căn hộ',
        'request_bookings' => 'Đơn đặt chưa duyệt',
        'request_bookings_confirmed' => 'Đơn đặt đã duyệt'
    ],
    'search' => 'Tìm kiếm',
    'album' => 'Album ảnh',
    'main_info' => 'Thông tin chính',
    'more_info' => 'Thông tin thêm',
    'seo' => 'Thông tin SEO',
    'more_lang' => 'Thông tin thêm',
    'filter' => 'Lọc',
    'limit' => 'Hiển thị',
    'enable_2fa' => "Bật bảo mật 2 lớp",
    'disable_2fa' => "Tắt bảo mật 2 lớp",
    'note_2fa1' => "Bạn phải thiết lập ứng dụng Google Authenticator của mình trước khi sử dụng.",
    'note_2fa2' => "Bạn sẽ không thể đăng nhập nếu không xác thực",
    'note_2fa' => "Vui lòng dùng điện thoại quét mã hoặc sử dụng mã code",
    'complete' => "Hoàn tất",
    '2fa' => "Bảo mật tài khoản",
    'login' => "Đăng nhập",
    'reset_2fa' => "Reset dữ liệu",
    'active' => "Kích hoạt",
    'inactive' => "Hủy kích hoạt",
    'widget' => [
        'title' => 'Tiện ích',
        'name' => 'Tên',
        'slug' => 'Đường dẫn',
        'code' => 'Code',
        'status' => 'Trạng thái',
        'lock' => 'Khóa'
    ],

    'user_manager' => [
        'login' => 'Đăng nhập',
        'register' => 'Đăng ký',
        'confirm' => 'Xác nhận',
        'recover_password' => 'Khôi phục mật khẩu',
        'username' => 'Tên người dùng',
        'phone' => 'Số điện thoại',
        'email' => 'Email',
        'password' => 'Mật khẩu',
        'confirm_password' => 'Xác nhận lại mật khẩu',

        'remember' => 'Ghi nhớ đăng nhập',
        'forgot_password' => 'Quên mật khẩu',
        'have_account' => 'Bạn đã có tài khoản?',
        'have_no_account' => 'Bạn chưa có tài khoản?',
        'message' => 'Nhập email đã đăng ký tài khoản để khôi phục mật khẩu',

        'enter_phone_number' => 'Nhập số điện thoại',
        'enter_password' => 'Nhập mật khẩu',
        'enter_username' => 'Nhập tên người dùng',
        'enter_email' => 'Nhập email',

    ],
    'room' => [
        'title' => 'Quản lý Căn hộ',
        'name' => 'Tên Căn hộ',
        'image' => 'Hình ảnh',
        'amount' => 'Số người',
        'acreage' => 'Diện tích(m2)',
        'price' => 'Giá thuê/tháng',
        'status' => 'Trạng thái',
        'type' => 'Loại Căn hộ',
        'description' => 'Mô tả',
        'is_enabled' => 'Kích hoạt',
        'updated_by' => 'Cập nhật bởi',
        'validation' => [
            'name_not_empty' => 'Tên Căn hộ không được để trống',
            'name_exist' => 'Tên Căn hộ đã tồn tại',
            'amount_not_empty' => 'Số người không được để trống',
            'amount_not_numeric' => 'Số người phải là một con số',
            'price_not_empty' => 'Giá Căn hộ không được để trống',
            'price_not_numeric' => 'Giá Căn hộ phải là một con số',
            'description_not_empty' => 'Mô tả Căn hộ không được để trống',
        ]
    ],
    'type' => [
        'title' => 'Quản lý loại Căn hộ',
        'name' => 'Tên loại Căn hộ',
        'warning' => 'Không thể xoá loại Căn hộ vì có Căn hộ đang sử dụng',
        'description' => 'Mô tả',
        'updated_by' => 'Cập nhật bởi',
        'validation' => [
            'name_not_empty' => 'Tên loại Căn hộ không được để trống',
            'description_not_empty' => 'Mô tả loại Căn hộ không được để trống',
            'name_exist' => 'Tên loại Căn hộ đã tồn tại'
        ]
    ],
    'service' => [
        'title' => 'Quản lý dịch vụ',
        'name' => 'Tên dịch vụ',
        'price' => 'Đơn giá',
        'description' => 'Mô tả',
        'is_enabled' => 'Kích hoạt',
        'updated_by' => 'Cập nhật bởi',
        'validation' => [
            'name_not_empty' => 'Tên dịch vụ không được để trống',
            'name_exist' => 'Tên dịch vụ đã tồn tại',
            'description_not_empty' => 'Mô tả dịch vụ không được để trống',
            'price_not_empty' => 'Giá dịch vụ dịch vụ không được để trống',
            'price_not_numeric' => 'Giá dịch vụ dịch vụ phải là một con số',
        ]
    ],
    'confirm' => 'Bạn có chắc chắn xóa'
];
