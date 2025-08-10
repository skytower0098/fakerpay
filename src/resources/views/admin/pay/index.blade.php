@extends('fakerpay::layouts.app')

@section('content')
<div class="container mt-4">
    <h2>مدیریت سفارشات</h2>

    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>شناسه</th>
                <th>کاربر</th>
                <th>قیمت</th>
                <th>وضعیت</th>
                <th>تاریخ ایجاد</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pays as $pay)
                <tr>
                    <td>{{ $pay->id }}</td>
                    <td>{{ $pay->user->name ?? 'بدون کاربر' }}</td>
                    <td>{{ number_format($pay->price) }} تومان</td>
                    <td>{{ $pay->status }}</td>
                    <td>{{ $pay->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <a href="{{ url('fakerpay/admin/order/' . $pay->id) }}" class="btn btn-sm btn-primary">مشاهده</a>
                        <form action="{{ url('fakerpay/admin/order/' . $pay->id . '/delete') }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $pays->links() }}
</div>
@endsection
