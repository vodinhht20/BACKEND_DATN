<?php
return [
    'status' => [
        'private' => 0,
        'public' => 1,
    ],
    'type' => [
        'leave_work' => 1,
        'edit_work' => 2,
        'ot' => 3,
    ],
    'type_info' => [
        1 => [
            'title' => "Mẫu đơn 1",
            'info' => "Giao diện của mẫu này hiển thị lựa chọn ngày nghỉ, nội dung và thông tin người duyệt đơn. Đơn này dùng cho các loại đơn xin nghỉ phép, nghỉ thai sản, nghỉ không lương, ...."
        ],
        2 => [
            'title' => "Mẫu đơn 2",
            'info' => "Giao diện của mẫu này hiển thị thông tin nội dung ngày công cần sửa. Đơn này dùng cho các loại đơn khôi phục công, sửa chấm công, ..."
        ],
        3 => [
            'title' => "Mẫu đơn 3",
            'info' => "Giao diện của mẫu này hiển thị giờ bắt đầu giờ kết thúc làm thêm giờ. Đơn này dùng cho các loại đơn làm thêm giờ, làm thêm giờ vào ngày lễ..."
        ],
    ]
];