const menu = () => {
    document.querySelector('.burger').addEventListener('click', () => {
        document.querySelector('#header-list-items').classList.toggle('show');
        document.querySelectorAll('.burger span').forEach(item => {
            item.classList.toggle('clicked');
        });
    });
    window.addEventListener('resize', () => {
        if (window.width > 767) {
            document.querySelector('#header-list-items').classList.add('show');
            document.querySelectorAll('.burger span').forEach(item => {
                item.classList.remove('clicked');
            });
        }else{
            document.querySelector('#header-list-items').classList.remove('show');
        }
    });
}