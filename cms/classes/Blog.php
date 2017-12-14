<?php

class Blog extends Database
{
    public function showArticlesFE($limit)
    {
        $i = 0;
        $content = '';
        $result = $this->query("SELECT * FROM `blog` WHERE `archived` = 0 ORDER BY `date` LIMIT " . intval($limit));
        while ($row = $result->fetch_assoc()) {
            if ($i >= $limit) break;
            $content .= "<li>";
            $content .= "<span>" . htmlspecialchars($row["title"]) . "</span>";
            $content .= "<span>" . htmlspecialchars($row["date"]) . "</span><br>";
            $content .= "<span>" . htmlspecialchars($row["content"]) . "</span>";
            $content .= "</li>";
            $i++;
        }
        return $content;
    }

    public function showArticlesBE()
    {
        $content = '';
        $result = $this->query("SELECT * FROM `blog` ORDER BY `date`");
        while ($row = $result->fetch_assoc()) {
            $row['archived'] = (boolval($row['archived'])) ? 'Ja' : 'Nee';
            $content .= "<tr>";
            $content .= "<td>" . htmlspecialchars($row['title']) . "</td>";
            $content .= "<td>" . htmlspecialchars($row['date']) . "</td>";
            $content .= "<td>" . htmlspecialchars($row['content']) . "</td>";
            $content .= "<td>" . htmlspecialchars($row['source']) . "</td>";
            $content .= "<td>" . htmlspecialchars($row['archived']) . "</td>";
            $content .= "<td><button class=\"btn btn-default\" type=\"submit\" name=\"edit\" value=\"{$row['blog_id']}\">Bewerken</button></td>";
            $content .= "<td><button class=\"btn btn-default\" type=\"submit\" name=\"delete\" value=\"{$row['blog_id']}\">Verwijderen</button></td>";
            $content .= "</tr>";
        }
        return $content;
    }

    public function addArticle($title, $content, $source)
    {
        return $this->query("INSERT INTO `blog` (`title`, `content`, `source`, `date`) VALUES ('{$title}', '{$content}', '{$source}', '" . date("Y-m-d H:i:s") . "');");
    }

    public function editArticle($title, $content, $source, $blog_id)
    {
        return $this->query("UPDATE `blog` SET `title` = '{$title}', `content` = '{$content}', `source` = '{$source}' WHERE `blog_id` = '{$blog_id}';");
    }

    public function archiveArticle($blog_id)
    {
        return $this->query("UPDATE `blog` SET `archived` = 1 WHERE `blog_id` = {$blog_id};");
    }
}