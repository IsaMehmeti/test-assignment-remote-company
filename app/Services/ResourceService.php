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
    /*PdfFile Methods*/
    public function getAllPdfFiles()
    {
        return PdfFile::all();
    }

    public function getSinglePdfFile($id)
    {
        return PdfFile::findOrFail($id);
    }
    /*PdfFile Methods End*/




    /*HtmlSnippet Methods*/
    public function getAllHtmlSnippets()
    {
        return HtmlSnippet::all();
    }

    public function getSingleHtmlSnippet($id)
    {
        return HtmlSnippet::findOrFail($id);
    }
    /*HtmlSnippet Methods End*/





    /*Link Methods*/
    public function getAllLinks()
    {
        return Link::all();
    }
    public function getSingleLink($id)
    {
        return Link::findOrFail($id);
    }
    /*Link Methods End*/
}
