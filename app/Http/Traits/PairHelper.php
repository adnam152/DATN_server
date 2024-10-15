<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\DB;

trait PairHelper
{
    /**
     * Hàm để tạo ra cặp giá trị duy nhất từ hai bảng
     *
     * @param string $tableName Tên bảng cần kiểm tra
     * @param string $firstColumn Tên cột đầu tiên
     * @param string $secondColumn Tên cột thứ hai
     * @param string $firstModel Tên mô hình cho cột đầu tiên
     * @param string $secondModel Tên mô hình cho cột thứ hai
     * @return array
     */
    public function generateUniquePair($tableName, $firstColumn, $secondColumn, $firstModel, $secondModel)
    {
        do {
            $firstValue = $firstModel::inRandomOrder()->first()->id;
            $secondValue = $secondModel::inRandomOrder()->first()->id;

            // Kiểm tra tính duy nhất trong database
            $exists = DB::table($tableName)
                ->where($firstColumn, $firstValue)
                ->where($secondColumn, $secondValue)
                ->exists();
        } while ($exists); // Tiếp tục tạo cặp cho đến khi tìm được cặp duy nhất

        return [
            $firstColumn => $firstValue,
            $secondColumn => $secondValue
        ];
    }
}
