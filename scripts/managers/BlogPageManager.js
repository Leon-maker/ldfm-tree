import IsotopeManager from './IsotopeManager.js';
export default class BlogPageManager {
    constructor() {
        console.log(`%cBlogPageManager class created`, `color: #00ff00; font-size: 14px;`);
        this.blogPage = null;
        this._data = null;
        this._loadIterationsData = 0;

        /**
         * Elements du DOM
         */
        this._blogPage = document.querySelector('.page-template-archive');
        this._isotopeContainer = document.querySelector('.isotope-container');

        // Wait for the DOM to be ready & data to be loaded to init the page
        this._waitForDOMAndDataReady();
    }

    /**
     * Avant de lancer l'initialisation de la page, on vérifie que le DOM est prêt et que les données sont chargées.
     * @private
     */
    _waitForDOMAndDataReady() {
        if (!this._data) {
            this._loadIterationsData++;
            console.log(`%cBlogPageManager._waitForDOMAndDataReady() - data not ready`, `color: #00ff00; font-size: 14px;`);

            /**
             * Si les datas ne sont pas chargées après 10 tentatives, on met les paramètres par défaut pour éviter des erreurs d'affichage.
             */
            if (this._loadIterationsData > 10) {
                console.warn(`%cBlogPageManager._waitForDOMAndDataReady() - les datas n'ont pas été chargées après ${this._loadIterationsData} tentatives. Vérifiez que les datas ont bien été mises en place avec la méthode de la classe setData(). Les paramètres ont été mis par défaut pour éviter des erreurs d'affichage.`, `color: darkorange; font-size: 14px; padding: 10px; border-radius: 5px;`)
                this.setData({
                    "filter": "default"
                });
                this._initPage();
            }

            setTimeout(() => this._waitForDOMAndDataReady(), 100);
            return;
        } else {
            console.log(`%cBlogPageManager._waitForDOMAndDataReady() - data ready`, `color: #00ff00; font-size: 14px;`);
            this._initPage();
        }
    }

    /**
     * Initialisation de la page.
     * @private
     */
    _initPage() {
        console.log(`%cBlogPageManager._initPage() a bien été trigger.`, `color: #00ff00; font-size: 14px;`);

        console.log('Datas chargées' , this._data);

        /**
         * Initialisation de l'isotope
         * @type {IsotopeManager}
         * @private
         */
        this._isotopeManager = new IsotopeManager({
            isotopeContainer: this._isotopeContainer,
            options: {
                // Options
                fitRows: {
                    gutter: 35
                },
                pagination: true
            }
        });
    }

    /**
     * Setter pour les datas de la page.
     * @param data
     */
    setData(data) {
        console.log(`%cBlogPageManager.setData() a bien été trigger.`, `color: #00ff00; font-size: 14px;`);
        console.log('Data reçue: ', data);
        this._data = data;
    }

}