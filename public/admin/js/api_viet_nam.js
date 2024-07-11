// $(document).ready(function () {
//     // Load dữ liệu tỉnh/thành
//     $.getJSON('https://esgoo.net/api-tinhthanh/1/0.htm', function (data_tinh) {
//         if (data_tinh.error == 0) {
//             $.each(data_tinh.data, function (key_tinh, val_tinh) {
//                 $("#city").append('<option value="' + val_tinh.id + '" data-name="' +
//                     val_tinh.full_name + '">' + val_tinh.full_name + '</option>');
//             });

//             // Sự kiện chọn tỉnh/thành
//             $("#city").change(function (e) {
//                 var cityName = $("#city option:selected").data("name");
//                 $("#city_name").val(cityName);

//                 var idtinh = $(this).val();
//                 // Reset dropdown quận/huyện và phường/xã
//                 $("#district").html('<option value="0">Quận/Huyện</option>');
//                 $("#ward").html('<option value="0">Phường/Xã</option>');

//                 // Load dữ liệu quận/huyện
//                 $.getJSON('https://esgoo.net/api-tinhthanh/2/' + idtinh + '.htm', function (
//                     data_quan) {
//                     if (data_quan.error == 0) {
//                         $.each(data_quan.data, function (key_quan, val_quan) {
//                             $("#district").append('<option value="' +
//                                 val_quan.id + '" data-name="' + val_quan
//                                     .full_name + '">' + val_quan.full_name +
//                                 '</option>');
//                         });

//                         // Sự kiện chọn quận/huyện
//                         $("#district").change(function (e) {
//                             var districtName = $(
//                                 "#district option:selected").data(
//                                     "name");
//                             $("#district_name").val(districtName);

//                             var idquan = $(this).val();
//                             // Reset dropdown phường/xã
//                             $("#ward").html(
//                                 '<option value="0">Phường/Xã</option>');

//                             // Load dữ liệu phường/xã
//                             $.getJSON('https://esgoo.net/api-tinhthanh/3/' +
//                                 idquan + '.htm',
//                                 function (data_phuong) {
//                                     if (data_phuong.error == 0) {
//                                         $.each(data_phuong.data,
//                                             function (key_phuong,
//                                                 val_phuong) {
//                                                 $("#ward").append(
//                                                     '<option value="' +
//                                                     val_phuong
//                                                         .id +
//                                                     '" data-name="' +
//                                                     val_phuong
//                                                         .full_name +
//                                                     '">' +
//                                                     val_phuong
//                                                         .full_name +
//                                                     '</option>');
//                                             });

//                                         // Sự kiện chọn phường/xã
//                                         $("#ward").change(function (e) {
//                                             var wardName = $(
//                                                 "#ward option:selected"
//                                             ).data(
//                                                 "name");
//                                             $("#ward_name").val(
//                                                 wardName);
//                                         });
//                                     }
//                                 });
//                         });
//                     }
//                 });
//             });
//         }
//     });
// });
$(document).ready(function () {
    // Load dữ liệu tỉnh/thành
    $.getJSON('https://esgoo.net/api-tinhthanh/1/0.htm', function (data_tinh) {
        if (data_tinh.error == 0) {
            $.each(data_tinh.data, function (key_tinh, val_tinh) {
                $("#city").append('<option value="' + val_tinh.id + '" data-name="' +
                    val_tinh.full_name + '">' + val_tinh.full_name + '</option>');
            });

            // Sự kiện chọn tỉnh/thành
            $("#city").change(function (e) {
                var cityName = $("#city option:selected").data("name");
                $("#city_name").val(cityName);

                var idtinh = $(this).val();
                // Reset dropdown quận/huyện và phường/xã
                $("#district").html('<option value="0">Quận/Huyện</option>');
                $("#ward").html('<option value="0">Phường/Xã</option>');

                // Load dữ liệu quận/huyện
                $.getJSON('https://esgoo.net/api-tinhthanh/2/' + idtinh + '.htm', function (
                    data_quan) {
                    if (data_quan.error == 0) {
                        $.each(data_quan.data, function (key_quan, val_quan) {
                            $("#district").append('<option value="' +
                                val_quan.id + '" data-name="' + val_quan
                                    .full_name + '">' + val_quan.full_name +
                                '</option>');
                        });

                        // Sự kiện chọn quận/huyện
                        $("#district").change(function (e) {
                            var districtName = $(
                                "#district option:selected").data(
                                    "name");
                            $("#district_name").val(districtName);

                            var idquan = $(this).val();
                            // Reset dropdown phường/xã
                            $("#ward").html(
                                '<option value="0">Phường/Xã</option>');

                            // Load dữ liệu phường/xã
                            $.getJSON('https://esgoo.net/api-tinhthanh/3/' +
                                idquan + '.htm',
                                function (data_phuong) {
                                    if (data_phuong.error == 0) {
                                        $.each(data_phuong.data,
                                            function (key_phuong,
                                                val_phuong) {
                                                $("#ward").append(
                                                    '<option value="' +
                                                    val_phuong
                                                        .id +
                                                    '" data-name="' +
                                                    val_phuong
                                                        .full_name +
                                                    '">' +
                                                    val_phuong
                                                        .full_name +
                                                    '</option>');
                                            });

                                        // Sự kiện chọn phường/xã
                                        $("#ward").change(function (e) {
                                            var wardName = $(
                                                "#ward option:selected"
                                            ).data(
                                                "name");
                                            $("#ward_name").val(
                                                wardName);

                                            // Tạo định dạng chuỗi đầy đủ của địa chỉ
                                            var city = $("#city option:selected").text();
                                            var district = $("#district option:selected").text();
                                            var ward = $("#ward option:selected").text();
                                            var fullAddress = `${ward}, ${district}, ${city}, Vietnam`;
                                            fullAddress = fullAddress.replace(/,\s*$/, ""); // Xóa dấu phẩy thừa ở cuối

                                            // Fill vào ô full_address
                                            $("#searchInput").val(fullAddress);

                                            console.log("Full Address:", fullAddress);
                                            handleSearch();

                                        });
                                    }
                                });
                        });
                    }
                });
            });
        }
    });
});
