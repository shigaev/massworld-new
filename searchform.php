<form class="search-form" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>">
    <label class="screen-reader-text" for="s">Search: </label>
    <input size="20" class="search-form-input__value" type="search" placeholder="Search the site..."
           value="<?php echo get_search_query() ?>" name="s" id="s"/>
    <button class="search-form__button" type="submit" id="searchsubmit" value="search">
    </button>
</form>