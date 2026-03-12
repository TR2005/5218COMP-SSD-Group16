<?php
include "Masterpage.php";
MasterPage();
$Content = <<<Content
<title>Home</title>
    <table class="table teable-striped table-hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>Poster</th>
                <th>link</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Test1</td>
                <td>User1</td>
                <td><a href="Comments.php?id=1" class="btn btn-sm" role="button">Link</td>
            </tr>
            <tr>
                <td>Test2</td>
                <td>User2</td>
                <td><a href="Comments.php?id=2" class="btn btn-sm" role="button">Link</td>
            </tr>
            <tr>
                <td>Test3</td>
                <td>User3</td>
                <td><a href="Comments.php?id=3" class="btn btn-sm" role="button">Link</td>
            </tr>
        </tbody>
    </table>
Content;
echo $Content;
?>