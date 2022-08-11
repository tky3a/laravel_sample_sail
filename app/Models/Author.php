<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory;
    use SoftDeletes; // 論理削除(これを記載することでdeleteやdestroyで削除した場合にdeleted_atに自動的に追記される)

    // テーブルの主キーをidではなく、author_idとする
    protected $primaryKey = 'author_id';

    // タイムスタンプを記録しない（created_at updated_atを記録しない）
    // protected $timestamps = false;

    // ホワイトリスト(編集可)
    protected $fillable = [
        'name',
        'kana'
    ];

    // ブラックリスト(編集不可)
    // protected $guarded = [
    //     'id',
    //     'created_at',
    //     'updated_at'
    // ];

    // firstOrCreateのサンプル
    public function createAuthor()
    {
        $author = Author::firstOrCreate(['name' => '著者A']);
    }
}
