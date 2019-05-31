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
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Height</th>
                <th>Province</th>
                <th>Sport</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td data-th="Name"><span class="bt-content">James Camera</span></td>
                <td data-th="Age"><span class="bt-content">31</span></td>
                <td data-th="Gender"><span class="bt-content">Male</span></td>
                <td data-th="Height"><span class="bt-content">6'1</span></td>
                <td data-th="Province"><span class="bt-content">British Columbia</span></td>
                <td data-th="Sport"><span class="bt-content">Hiking</span></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>


</body>
</html>