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
    <style>

        DIV.jogger {
            PADDING-RIGHT: 2px; PADDING-LEFT: 2px; PADDING-BOTTOM: 2px; MARGIN: 7px;
            PADDING-TOP: 2px; FONT-FAMILY: "Lucida Sans Unicode",
        "Lucida Grande", LucidaGrande, "Lucida Sans", Geneva, Verdana, sans-serif
        }
        DIV.jogger A {
            PADDING-RIGHT: 0.64em; PADDING-LEFT: 0.64em; PADDING-BOTTOM: 0.43em;
            MARGIN: 2px; COLOR: #fff; PADDING-TOP: 0.5em;
            BACKGROUND-COLOR: #ee4e4e; TEXT-DECORATION: none
        }
        DIV.jogger A:hover {
            PADDING-RIGHT: 0.64em; PADDING-LEFT: 0.64em; PADDING-BOTTOM: 0.43em;
            MARGIN: 2px; COLOR: #fff; PADDING-TOP: 0.5em; BACKGROUND-COLOR: #de1818
        }
        DIV.jogger A:active {
            PADDING-RIGHT: 0.64em; PADDING-LEFT: 0.64em; PADDING-BOTTOM: 0.43em;
            MARGIN: 2px; COLOR: #fff; PADDING-TOP: 0.5em; BACKGROUND-COLOR: #de1818
        }
        DIV.jogger SPAN.current {
            PADDING-RIGHT: 0.64em; PADDING-LEFT: 0.64em; PADDING-BOTTOM: 0.43em;
            MARGIN: 2px; COLOR: #6d643c; PADDING-TOP: 0.5em; BACKGROUND-COLOR: #f6efcc
        }
        DIV.jogger SPAN.disabled {
            DISPLAY: none
        }
    </style>
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
    <div class="jogger" style="float: right">
        <?php
            $maxpage = ceil($result['count']/50);
            echo $maxpage;
        ?>

<!--            <span class="current">1</span>-->
<!--            <span class="disabled">&lt; </span>-->


        <?php
            for ($i=1 ;$i<=$maxpage+1; $i++){
                if (if($_GET['page'] == 1){

                }

                #echo "<span class=\"current\">$i</span>";
                echo "<a href=\"#?page=2\">$i</a>"
            }
        ?>

    </div>
</div>


</body>
</html>
<script src="./static/assets/js/jquery-1.8.3.min.js"></script>
<?=Html::jsFile('@web/static/layer/layer.js')?>
<script>



</script>