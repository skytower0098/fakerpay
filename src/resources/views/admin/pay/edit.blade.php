<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ویرایش سفارش #{{ $pay->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<div class="container">
    <h1 class="mb-4">ویرایش سفارش #{{ $pay->id }}</h1>

    <form id="edit-order-form">
        @csrf
        <div class="mb-3">
            <label for="status" class="form-label">وضعیت</label>
            <input type="number" class="form-control" id="status" name="status" value="{{ $pay->status }}">
        </div>
        <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
        <a href="/fakerpay/orders" class="btn btn-secondary">بازگشت</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.getElementById('edit-order-form').addEventListener('submit', function(e){
        e.preventDefault();

        const status = document.getElementById('status').value;

        axios.post(`/api/fakerpay/orders/{{ $pay->id }}`, {
            status: status,
            _token: '{{ csrf_token() }}'
        }).then(response => {
            alert(response.data.message);
        }).catch(error => {
            alert('خطا در بروزرسانی');
        });
    });
</script>

</body>
</html>
