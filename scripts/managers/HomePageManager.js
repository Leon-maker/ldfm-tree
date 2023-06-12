export default class HomePageManager {
    constructor() {
        // Lors de l'instanciation de la classe, c'est ici que le code commence. On appelle donc la méthode _init().
        this._homePageContainer = document.querySelector('.home');
        this._init();
    }

    /** Private **/
    _init() {
        console.log('HomePageManager initialisé.');
        // Log with style
        console.log('%cPage : Home Page',
            'color: #fff; background-color: #000; padding: 5px; border-radius: 5px;'
        );
        // Good black background and style for console.log
        console.log('%cSite développé par l\'Agence THRIVE - https://agencethrive.fr', 'color: #fff; background-color: #000; padding: 5px; border-radius: 5px;');
    }

    /** Public **/
    show() {
        this._homePageContainer.style.display = 'block';
    }

    hide() {
        this._homePageContainer.style.display = 'none';
    }
}
