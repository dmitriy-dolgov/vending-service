<?php

namespace helpers;

class Paginator
{
    protected $elemsTotal;

    protected $elemsOnPage;

    protected $currentPage;


    public function __construct($elemsTotal)
    {
        $this->elemsTotal = $elemsTotal;

        $this->elemsOnPage = $_GET['p']['count'] ?? 10;
        $this->currentPage = $_GET['p']['page'] ?? 1;
    }

    public function getElemsOnPage()
    {
        return $this->elemsOnPage;
    }

    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    public function traverse()
    {
        yield 'prev' => [
            'active' => ($this->currentPage > 1),
            'link' => Html::setGetValue('p[page]', $this->currentPage - 1),
        ];

        $pages = ceil($this->elemsTotal / $this->elemsOnPage);

        for ($i = 0; $i < $pages; ++$i) {
            $currPageNum = $i + 1;
            yield 'button' => [
                'active' => ($this->currentPage != $currPageNum),
                'link' => Html::setGetValue('p[page]', $currPageNum),
                'number' => $currPageNum,
            ];
        }

        yield 'next' => [
            'active' => ($this->currentPage < $pages),
            'link' => Html::setGetValue('p[page]', $this->currentPage + 1),
        ];
    }

}
