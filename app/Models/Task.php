<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
    protected $fillable = ['title','description', 'long_description'];
    // $fillable là thuộc tính dùng để chỉ định những trường trong csdl 
    // mà bạn cho phép điền dữ liệu thông qua phương thức mass assignment.

    // mass assignment: Là khi bạn truyền một mảng dữ liệu (ví dụ từ form) vào hàm create() hoặc update()
    // để tự động gán giá trị vào các cột trong bảng cơ sở dữ liệu 
    // mà không cần gán từng trường một cách thủ công.

    public function toggleComplete()
    {
        // Dùng để thay thế bước đảo ngược bên web.php
        $this->completed = !$this->completed;
        $this->save();
    }
}
