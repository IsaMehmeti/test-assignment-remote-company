<?php

namespace App\Services;

use App\Models\HtmlSnippet;
use App\Models\Link;
use App\Models\PdfFile;

/**
 * Class ResourceService
 * @package App\Services
 */
class ResourceService
{
    public function getAllPdfFiles()
    {
        return PdfFile::all();
    }

    public function getAllHtmlSnippets()
    {
        return HtmlSnippet::all();
    }

    public function getAllLinks()
    {
        return Link::all();
    }
}
