<?php

use yii\helpers\Html;

?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=no">
    <?=Html::cssFile('@web/static/assets/css/table-style.css')?>
</head>
<body>
<div class="container">
    <div id="page">
        <h2>为您搜索到以下结果：</h2>
        <!--<p>xxx</p>-->
        <table id="table-breakpoint">
            <thead>
            <tr>
                <th>名称</th>
                <th>所属行业</th>
                <th>联系电话</th>
                <th>所在地址</th>
                <th>图片</th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach($result['pois'] as $key=>$value){

            ?>

            <tr>
                <td data-th="name"><span class="bt-content"><?= $value['name'] ?></span></td>
                <td data-th="type"><span class="bt-content"><?= $value['type'] ?></span></td>
                <td data-th="address">
                    <span class="bt-content">
                        <?php
                        if (!is_array($value['address'])){
                            echo $value['address'];
                        }else{
                            if (empty($value['address'])){
                                echo '';
                            };
                        }
                        ?>
                    </span></td>
                <td data-th="Height">
                    <span class="bt-content">
                        <?php
                        if (!is_array($value['tel'])){
                            echo str_replace(';', "<br/>", $value['tel']);
                        }else{
                            if (empty($value['tel'])){
                                echo '';
                            };
                        }
                        ?>
                    </span>
                </td>
                <td data-th="Height">
                    <span class="bt-content">
                        <?php
                            $photos = [
                                'title' => $value['name'] ,
                                'id'    => $value['id'] ,
                                'start' => 0,
                                'data'  => []
                            ];
                            foreach ($value['photos'] as $k=>$photo){
                                $photos['data'][] = [
                                    'alt' => $k,
                                    'pid' => $k,
                                    'src' => $photo['url'],
                                    'thumb' => $photo['url']
                                ];
                            }
                        ?>
                    </span>
                </td>
            </tr>

            <?php
                }
            ?>
            </tbody>
        </table>
    </div>
</div>
<div class="jogger">
    <span class="disabled">&lt; </span>
    <span class="current">1</span>
    <a href="#?page=2">2</a>
    <a href="#?page=3">3</a>
    <a href="#?page=4">4</a>
    <a href="#?page=5">5</a>
    <a href="#?page=6">6</a>
    <a href="#?page=7">7</a>...
    <a href="#?page=199">199</a>
    <a href="#?page=200">200</a>
    <a href="#?page=2">
        &gt; </a></div>

</body>
</html>
<script src="./static/assets/js/jquery-1.8.3.min.js"></script>
<?=Html::jsFile('@web/static/layer/layer.js')?>
<script>

    layer.msg('hello');


</script>