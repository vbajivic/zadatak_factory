<?php
if (isset($_GET['submit1'])) {
    $link = "req/";
    if (isset($_GET['category'])) {
        $link .= "1";
    } else {
        $link .= "0";
    }
    if (isset($_GET['tags'])) {
        $link .= "1";
    } else {
        $link .= "0";
    }
    if (isset($_GET['ingredients'])) {
        $link .= "1";
    } else {
        $link .= "0";
    }
    $link .= "/{$_GET['radio']}";
    if ($_GET['per_page']) {
        $link .= "/{$_GET['per_page']}";
    } else {
        $link .= "/all";
    }
    header("Location: ./{$link}");
    exit();
}
if (isset($_GET['submit2'])) {
    $link = "cat/";
    if (!$_GET['textCat']) {
        $link .= "all";
    } else {
        $link .= "{$_GET['textCat']}";
    }
    header("Location: ./{$link}");
    exit();
}
if (isset($_GET['submit3'])) {
    $link = "tag/";
    if (!$_GET['textTags']) {
        $link .= "all";
    } else {
        $link .= "{$_GET['textTags']}";
    }
    header("Location: ./{$link}");
    exit();
}
?>

<!DOCTYPE html>
<html lang="HR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> Jela </title>


    </head>
    <body >
        <p>NASLOV STRANICE</p>
        <form action="" method="get">
            <div class="category" style="padding:5px; border-style: solid;">
            <p> Category </p>
            <label for="textCat"> prazno vraća sve</label><br>
            <label for="textCat"> "null" vraća bez kategorije</label><br>
            <label for="textCat"> "!null" vraća sve s bilokojom kategorijom </label><br>
            <label for="textCat"> "ID" vraća s tim ID </label><br><br>
            <input type="textbox" id="textCat" name="textCat">
            <br><br>
            <input type="submit" name="submit2" value="GO">
            </div>
            <br><br>
            
            <div class="tags" style="padding:5px; border-style: solid;">
            <p> Tags </p>
            <label for="textTags"> ID odvojeni zarezom; e.g. 1,2,7,8 ; ako je 0 vraća sve </label><br><br>
            <input type="textbox" id="textTags" name="textTags">
            <br><br>
            <input type="submit" name="submit3" value="GO">
            </div>
            <br><br>
            
            <div class="request" style="padding:5px; border-style: solid;">
                <p> Request </p>
                <input type="textbox" id="per_page" name="per_page">
                <label for="per_page"> Koliko jela po stranici (prazno ili 0 = sva jela)</label><br>
                <input type="checkbox" id="category" name="category" value="category" >
                <label for="category"> Category</label>
                <input type="checkbox" id="tags" name="tags" value="tags">
                <label for="tags"> Tags</label>
                <input type="checkbox" id="ingredients" name="ingredients" value="ingredients">
                <label for="ingredients"> Ingredients</label>
                <br><br>

                <p> Language </p>
                <label>
                    <input type="radio" name="radio" value="hrv" checked="checked">Hrv
                </label>
                <label>
                    <input type="radio" name="radio" value="en">En
                </label>
                <label>
                    <input type="radio" name="radio" value="fr">Fr
                </label>
                <label>
                    <input type="radio" name="radio" value="de">De
                </label>
                <br><br>

                <input type="submit" name="submit1" value="GO">
            </div>
        </form>
    </body>
</html>
