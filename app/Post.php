<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //public static $key = 'post_id';
    protected $primaryKey = 'post_id';

    // Получаем превью новости для отображения на главной странице
    public function getDescription()
    {
        //TODO оптимизировать этот код за счет уменьшения запроса к БД (создать одну переменную и с ней работать, вместо выделения памяти под несколько переменных, которые могут быть огромными)
        $description = mb_stristr($this->post_content, "<hr />", TRUE);

        //если не были найдены символы разделения контента (<hr />)
        if(!$description)
        {
            $description = substr($this->post_content, 0, 500);
            if(iconv_strlen($description) > 500) {
                $description .= "<strong style='color:#ffab40'>...</strong>";
            }
        }

        return $description;
    }
}
