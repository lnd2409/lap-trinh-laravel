<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <select name="" id="" class="thanhPho">
        <option value="null">Chọn thành phố</option>
        @foreach ($thanhPho as $item)
            <option value="{{ $item->t_id }}">{{ $item->t_ten }}</option>
        @endforeach
    </select>
    <select name="" id="quanHuyen" class="quanHuyen" disabled>
        <option value="" id="delQuanHuyen">Chọn Quận - Huyện</option>
    </select>
    <select name="" id="phuongXa" class="phuongXa" disabled>
        <option value="" id="delPhuongXa">Chọn Phường - Xã</option>
    </select>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script>
        $('select.thanhPho').change(function (e) {
            e.preventDefault();
            var getID = $(this).children("option:selected").val();
            // console
            $.ajax({
                type: "GET",
                url: "http://127.0.0.1:8000/" + getID + "/quan-huyen",
                dataType: "json",
                success: function (response) {
                    $('.value-qh').remove();
                    $('.value-px').remove();
                    console.log(response);
                    $('#quanHuyen').removeAttr("disabled");
                    $('#delQuanHuyen').remove();
                    if (reponse = []) {
                        $('.quanHuyen').append('<option class="value-qh" disabled>Không có dữ liệu</option>');
                    }
                    for (let i = 0; i < response.length; i++) {
                        console.log(response[i].q_ten);
                        $('.quanHuyen').append('<option class="value-qh" value="' + response[i].q_id + '" >' + response[i].q_ten + '</option>');
                    }
                    $('select.quanHuyen').change(function (e) {
                        e.preventDefault();
                        var getIDQuanHuyen = $(this).children("option:selected").val();
                        $.ajax({
                            type: "GET",
                            url: "http://127.0.0.1:8000/" + getIDQuanHuyen + "/phuong-xa",
                            dataType: "json",
                            success: function (response) {
                                console.log(response);
                                $('.value-px').remove();
                                console.log(response);
                                $('#phuongXa').removeAttr("disabled");
                                $('#delPhuongXa').remove();
                                if (reponse = []) {
                                    $('.phuongXa').append('<option class="value-px" disabled>Không có dữ liệu</option>');
                                }
                                for (let i = 0; i < response.length; i++) {
                                    console.log(response[i].p_ten);
                                    $('.phuongXa').append('<option class="value-px" value="' + response[i].p_id + '" >' + response[i].p_ten + '</option>');
                                }
                            }
                        });
                    });
                }
            });
        });
    </script>
</body>
</html>
