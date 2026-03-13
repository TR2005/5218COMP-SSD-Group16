<?php
include "Masterpage.php";
MasterPage();
$Content = <<<Content
<title>Home</title>
    <table class="table teable-striped table-hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>Purpose</th>
                <th>link</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>General</td>
                <td>Discussion in regards to the work</td>
                <td><a href="Comments.php?id=1" class="btn btn-sm" role="button">Link</td>
            </tr>
            <tr>
                <td>Plans</td>
                <td>Discussing plans on what to do next</td>
                <td><a href="Comments.php?id=2" class="btn btn-sm" role="button">Link</td>
            </tr>
            <tr>
                <td>Problems</td>
                <td>area to discuss any problems encountered</td>
                <td><a href="Comments.php?id=3" class="btn btn-sm" role="button">Link</td>
            </tr>
        </tbody>
    </table>
Content;
echo $Content;
?>