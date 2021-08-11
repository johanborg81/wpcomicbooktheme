class Navbar {
    constructor() {
        this.sideMenu = document.getElementById('navbar__side-menu')
        this.main = document.getElementById('main');
        this.openBtn = document.querySelector('.sidemenu__open')
        this.closeBtn = document.querySelector('.sidemenu__close')
    }

    openSideMenu() {
        this.openBtn.addEventListener('click', (e) => {
            e.preventDefault()
            this.sideMenu.style.width = '250px'
            this.main.style.marginLeft = '250px'
        })
        
    }

    closeSideMenu() {
        this.closeBtn.addEventListener('click', (e) => {
            e.preventDefault()
            this.sideMenu.style.width = '0px'
            this.main.style.marginLeft = '0px'
        })
    }
}

let show = new Navbar()
show.openSideMenu()
show.closeSideMenu()