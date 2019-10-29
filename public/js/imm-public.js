(function ($) {
  'use strict';

  $(function () {
    var options = {
        valueNames: ['list__link', {
          data: ['level']
        }, {
          data: ['category']
        }]
      },
      mobileList = new List('mobile-list', options),
      spacesList = new List('spaces-list', options),
      sortByNameCtrl = document.getElementById('sort-by-name'),
      spacesListEl = document.getElementById('spaces-list'),
      spacesEl = spacesListEl.querySelector('ul.list'),
      mallEl = document.querySelector('.mall'),
      levelsEl = document.querySelector('.levels'),
      mapSpaces = document.querySelectorAll('.map__space'),
      storesEl = document.querySelector('.stores'),
      mallNav = document.querySelector('.mallnav'),
      contentButton = document.querySelector('.content__button'),
      selectedLevel,
      storeContentOpen,
      urlParams = new URLSearchParams(window.location.search);

    /**
     * sort by name ctrl
     * add/remove category name from list and sorts the spaces by name
     */
    sortByNameCtrl.addEventListener('click', function () {
      if (this.checked) {
        spacesEl.classList.remove('list--groupByCategory');
        spacesList.sort('list__link');
      } else {
        spacesEl.classList.add('list--groupByCategory');
        spacesList.sort('category');
      }
    });

    /**
     * Mobile List
     */
    document.getElementById('sort-by-name-mobile').addEventListener('click', function () {
      if (this.checked) {
        document.querySelector('ul.list').classList.remove('list--groupByCategory');
        mobileList.sort('list__link');
      } else {
        document.querySelector('ul.list').classList.add('list--groupByCategory');
        mobileList.sort('category');
      }
    });

    /**
     * Prevent click events on vacant shops
     * Pointer Events are disabled via CSS
     *
     */
    var vacantShopIds = mallEl.dataset.vacancies.split(','); // Returns an array
    vacantShopIds.forEach(function (id) {
      var vacancy = document.querySelector('.map__space[data-space="' + id + '"]');
      if (vacancy) {
        vacancy.classList.add('map__space--vacancy');
      }
    });

    /**
     * Get a map location from the url
     */
    if (urlParams.has('level') && urlParams.has('loc')) {
      var levelEl = levelsEl.querySelector('[data-level="' + urlParams.get('level') + '"]');
      var space = urlParams.get('loc');
      selectedLevel = urlParams.get('level');
      var levelEl = levelsEl.querySelector('[data-level="' + selectedLevel + '"]');

      mallEl.classList.add('mall--content-open');
      showLevelSpaces();
      showLevel(levelEl);
      showStoreContent(space);
      selectMapSpace(space);
    }



    /**
     * Select a store from the sidebar
     */
    spacesEl.addEventListener('click', function (e) {
      if (!e.target.classList.contains('list__link')) return;

      var parentEl = e.target.parentElement,
        space = parentEl.dataset.space;

      selectedLevel = parentEl.dataset.level.trim();

      var levelEl = levelsEl.querySelector('[data-level="' + selectedLevel + '"]');

      removeActiveClasses();

      parentEl.classList.add('list__item--active');
      mallEl.classList.add('mall--content-open');
      showLevelSpaces();
      showLevel(levelEl);
      showStoreContent(space);
      selectMapSpace(space);

    });

    /**
     * Clicking on a Level or Map Space
     */
    levelsEl.addEventListener('click', function (e) {

      if (e.target.classList.contains('map__space')) {
        var space = e.target.dataset.space,
          parentEl = e.target.parentElement;

        selectedLevel = parentEl.parentElement.dataset.level;

        removeActiveClasses();
        mallEl.classList.add('mall--content-open');
        e.target.classList.add('map__space--selected');
        showLevelSpaces();
        showStoreContent(space);
        selectMapSpace(space);


      }

      if (e.target.classList.contains('level')) {
        selectedLevel = e.target.dataset.level;
        showLevel(e.target);
        showLevelSpaces();
      }

    });


    mallNav.addEventListener('click', function (e) {
      if (e.target.classList.contains('mallnav__button--all-levels')) {
        showAllLevels();
      }

      if (e.target.classList.contains('mallnav__button--up')) {
        document.querySelector('.level[data-level="' + selectedLevel + '"]').classList.remove('level--current');
        selectedLevel = Number(selectedLevel) + 1;
        showNextLevel();
      }

      if (e.target.classList.contains('mallnav__button--down')) {
        document.querySelector('.level[data-level="' + selectedLevel + '"]').classList.remove('level--current');
        selectedLevel = Number(selectedLevel) - 1;
        showNextLevel();
      }
    });


    contentButton.addEventListener('click', function (e) {
      removeActiveClasses();
      storesEl.classList.remove('stores--open');
      mallEl.classList.remove('mall--content-open');
      e.target.classList.add('content__button--hidden');
    })

    /**
     * Show store title on map space hover
     */
    mapSpaces.forEach(function (space) {
      space.addEventListener('mouseenter', function (e) {
        if (!e.target.classList.contains('map__space') || e.target.classList.contains('map__space--vacancy')) {
          return;
        }

        var space = e.target.dataset.space,
          contentItem = document.querySelector('.store__item[data-space="' + space + '"]');

        contentItem.classList.add('store__item--hover');
      });
    });

    mapSpaces.forEach(function (space) {
      space.addEventListener('mouseleave', function (e) {
        if (!e.target.classList.contains('map__space')) {
          return;
        }

        var space = e.target.dataset.space;

        var contentItem = document.querySelector('.store__item[data-space="' + space + '"]');

        contentItem.classList.remove('store__item--hover');

      });
    });

    document.querySelector('.open-search').addEventListener('click', function (e) {
      spacesListEl.classList.toggle('spaces-list--open');
    });


    function removeActiveClasses() {
      var activeListItem = spacesEl.querySelector('li.list__item--active'),
        activeStoreContent = storesEl.querySelector('.store__card--current'),
        activeSpaceArea = levelsEl.querySelector('svg .map__space--selected');

      if (activeListItem) {
        activeListItem.classList.remove('list__item--active');
      }

      if (activeSpaceArea) {
        activeSpaceArea.classList.remove('map__space--selected');
      }

      if (activeStoreContent) {
        activeStoreContent.classList.remove('store__card--current');
      }
    }

    function showStoreContent(space) {
      document.querySelector('.list__item[data-space="' + space + '"]').classList.add('list__item--active');

      storesEl.classList.add('stores--open');
      document.querySelector('.store__card[data-space="' + space + '"]').classList.remove('store__item--hover');
      document.querySelector('.store__card[data-space="' + space + '"]').classList.add('store__card--current');

      contentButton.classList.remove('content__button--hidden');
    }


    function showLevel(levelEl) {
      // mallEl.classList.add('mall--content-open');
      levelsEl.classList.remove('levels--selected-0');
      levelsEl.classList.remove('levels--selected-1');
      levelsEl.classList.remove('levels--selected-2');
      levelEl.classList.add('level--current');
      levelEl.parentElement.classList.add('levels--open', 'levels--selected-' + selectedLevel);
      showMallNav();
    }


    function showAllLevels() {
      removeActiveClasses();
      mallEl.classList.remove('mall--content-open');
      mallNav.querySelector('.mallnav__button--down').classList.remove('boxbutton--disabled');
      mallNav.querySelector('.mallnav__button--up').classList.remove('boxbutton--disabled');
      levelsEl.querySelector('.level.level--current').classList.remove('level--current');
      levelsEl.classList.remove('levels--open', 'levels--selected-' + selectedLevel);
      storesEl.classList.remove('stores--open');
      contentButton.classList.add('content__button--hidden');

      hideMallNav();

      spacesList.filter();
    }

    function hideMallNav() {
      mallNav.classList.add('mallnav--hidden');
    }

    function showMallNav() {
      mallNav.classList.remove('mallnav--hidden');
      mallNav.querySelector('.mallnav__button--down').classList.remove('boxbutton--disabled');
      mallNav.querySelector('.mallnav__button--up').classList.remove('boxbutton--disabled');
      var levelEls = document.querySelectorAll('.level').length,
        lastLevel = levelEls - 1;

      if (selectedLevel == 0) {
        mallNav.querySelector('.mallnav__button--down').classList.add('boxbutton--disabled');
      }

      if (selectedLevel == lastLevel) {
        mallNav.querySelector('.mallnav__button--up').classList.add('boxbutton--disabled');
      }

    }

    function showNextLevel() {
      var levelEl = document.querySelector('.level[data-level="' + selectedLevel + '"]');
      removeActiveClasses();
      contentButton.classList.add('content__button--hidden');
      showLevel(levelEl);
      showLevelSpaces();
    }

    function selectMapSpace(space) {
      document.querySelector('.map__space[data-space="' + space + '"]').classList.add('map__space--selected');
    }

    /**
     * Filter the list of spaces (Desktop)
     * Show only the spaces on the same level as the selected store
     */
    function showLevelSpaces() {
      spacesList.filter(function (item) {
        return item.values().level === selectedLevel.toString();
      });
    }

    /**
     * Filter the list of spaces (Mobile)
     * Show only the spaces on the same level as the selected store
     */
    function showLevelSpaces() {
      spacesList.filter(function (item) {
        return item.values().level === selectedLevel.toString();
      });
    }

  });

})(jQuery);