<?php

namespace App\Exports;

use App\Models\Todo;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Auth;

class TodosExport implements FromQuery, WithHeadings
{
    public function query()
    {
        return Todo::query()->where('user_id', Auth::id());
    }

    public function headings(): array
    {
        return [
            'ID',
            'User ID',
            'Tiêu đề',
            'Hoàn thành',
            'Ngày tạo',
            'Ngày cập nhật'
        ];
    }
}
