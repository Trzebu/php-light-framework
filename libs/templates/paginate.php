
<!-- PHP light framework - paginate -->

<style>

    #plf_paginate_container {
        display: inline-block;
        padding-left: 0;
        margin: 20px 0;
        border-radius: 4px;
        box-sizing: border-box;
    }

    #plf_paginate_container > li {
        display: inline;
    }

    #plf_paginate_container > li > span, #plf_paginate_container > li > a {
        position: relative;
        float: left;
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #337ab7;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
    }

    .plf_active > a {
        z-index: 3;
        color: #fff!important;
        cursor: default;
        background-color: #337ab7!important;
        border-color: #337ab7!important;
    }

</style>

<ul id="plf_paginate_container" role="navigation">
    <li>
        <span>‹</span>
    </li>
    <?php
        $current_page = 0;

        if (Libs\Http\Request::urlVar("page") !== null) {
            $current_page = Libs\Http\Request::urlVar("page");
        }

        for ($i = 0; $i < round(($this->allRowCount / $this->pageLimit)); $i++) {
            if ($current_page + 1 == $i + 1) {
                echo "<li class='plf_active'><a href=" . Libs\Http\Request::url() . "?page={$i}>" . ($i + 1) . "</a></li>";
            } else {
                echo "<li><a href=" . Libs\Http\Request::url() . "/?page={$i}>" . ($i + 1) . "</a></li>";
            }
        }

    ?>
    <li>
        <a href="http://localhost?page=2" rel="next">›</a>
    </li>
</ul>