<?php
$link = mysqli_connect("localhost", "root", "")
or die ("Can't connect to MySQL Server!");
$db = mysqli_select_db($link, "catalog") or die("Kan database niet selecteren!");
$query = "SELECT isbn, title FROM books";
$result = mysqli_query($link, $query);
echo "<table cellpadding=\"2\" border=\"1\">";
echo "<tr><th>ISBN</th><th>TITEL</th></tr>";
while ($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    $isbn = $row["isbn"];
    $title = $row["title"];
    echo "<td>$isbn</td><td>$title</td>";
    echo "</tr>";
}
echo "</table>";
?>