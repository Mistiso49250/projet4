class Main{
    constructor(){
        // menu
        this.burgerIcon = document.getElementById('burgerIcon');
        this.siteCache = document.getElementById('siteCache');
        this.body = document.querySelector('body');

        this.burgerIcon.addEventListener('click', () => this.sidebar());
        this.siteCache.addEventListener('click', () => this.cache());

        //formulaire
        this.ajoutComm = document.getElementById('ajout');
        this.ajoutComm.addEventListener('click', () => {
            this.addCommentForm.style.display= 'block';
            this.sidebar();
        })
        this.submit = document.getElementById('submit');
        this.addCommentForm = document.getElementById('addCommentForm');
        this.commentContainer = document.getElementById('commentContainer');
       
    }

    // menu
    sidebar() {
        this.body.classList.toggle('withSidebar');
        event.preventDefault();
    }

    cache() {
        this.body.classList.remove('withSidebar');
        event.preventDefault();
    }
   

    // formulaire
    ajoutForm(){
        console.log(this.addCommentForm);
       if(this.ajoutComm){
        this.ajoutComm.addEventListener('click', () => {
            this.addCommentForm.style.display= 'block';
            this.sidebar();
        });
       } 
    }

    supForm(){
        this.submit.addEventListener('click', () => {
            this.addCommentForm.style.display= 'none';
        });
    }

    commentSide() {
        this.commentContainer.classList.toggle('withSidebar');
    }
    
}

let javascript = new Main