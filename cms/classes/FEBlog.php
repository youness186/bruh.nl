<?php

class FEBlog extends Database
{
    public function showArticlesFE($limit)
    {
        $i = 0;
        $content = '';
        $result = $this->query("SELECT * FROM `blog` WHERE `archived` = 0 ORDER BY `date` LIMIT " . intval($limit));
        while ($row = $result->fetch_assoc()) {
            if ($i >= $limit) break;
            $content .= "<li class='list-group-item'>";
            $content .= "<h3>" . htmlspecialchars($row["title"]) . "</h3>";
            $content .= "<span><strong>" . htmlspecialchars($row["date"]) . "</strong></span><br>";
            $content .= "<span>" . htmlspecialchars($row["content"]) . "</span>";
            $content .= "</li>";
            $i++;
        }
        return $content;
    }
}