
/**
 * open sidebar
 */
let base_url = window.location.origin;
let bars = document.querySelectorAll('.bars');
let sideBarNav = document.querySelector('.sidebar__nav');
let content = document.querySelector('.content');
bars.forEach((e) => {
    e.addEventListener("click", function () {
        sideBarNav.classList.toggle("is-active");
        content.classList.toggle("is-active");
    })
})

/**
 * Tooltip
 */

let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})

/**
 * Sub menu
 */
const subMenuItem = document.querySelectorAll("ul li.has-sub-ui");

subMenuItem.forEach((el) =>
    el.addEventListener("click", () => {
        var vh = el.children[1].scrollHeight;
        if (el.classList.contains("open")) {
            el.classList.remove("open");
            // el.children[1].classList.remove('open');
            el.children[1].style.height = 0;

        } else {
            subMenuItem.forEach((el2) => (el2.children[1].style.height = 0, el2.classList.remove("open")));
            el.classList.add("open");
            // el.children[1].classList.add('open');
            el.children[1].style.height = vh + "px";
        }
    })
);

/**
 dark mode
 **/
(function($){

    $(".setting_switch .lv-btn").on("change", function () {
        this.checked ? $("body").addClass("dark-theme") : $("body").removeClass("dark-theme")
    })

    $('#flexSwitchCheckDefault').change(function (event) {
        if (event.target.checked) {
            localStorage.setItem('isDarkMode', true);
            location.reload();
        } else {
            localStorage.setItem('isDarkMode', false);
            location.reload();
        }
    })
    function dark_mode() {

        if (localStorage.getItem('isDarkMode') === 'true') {
            document.body.classList.add("dark-theme")
            document.getElementById('flexSwitchCheckDefault').checked = true
        } else {
            document.body.classList.remove("dark-theme")
            document.getElementById('flexSwitchCheckDefault').checked = false
        }
    }


    window.onload = dark_mode();


})(jQuery);
//End dark mode


//ایجاد کد ملی
get_code = function() {
    axios.get(base_url + '/api/code/generate')
        .then(res => {
            document.getElementById('code').value = res.data['data']['code']
        })
        .catch(err => console.log(err));
}
onload = get_code
//کپی تو کلیپبرد
copy = function() {
    let copyText = document.getElementById("code");
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
    document.execCommand("copy");
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: "کپی شد: " + copyText.value,
        showConfirmButton: false,
        timer: 1000
    })
}
//بررسی صحت کد ملی
check_code = function(code) {
    let error = document.getElementById("errors")
    axios.post(base_url + '/api/code/check', {
        code: persianJs(code).persianNumber()._str
    })
        .then(function (res) {
            error.style.color = 'green'
            error.textContent = res.data
            setTimeout(function() {
                error.textContent = ''
            }, 3000);
        })
        .catch(function (err) {
            document.getElementById("errors").appendChild(createList(err.response.data.errors.code));
            setTimeout(function() {
                error.textContent = ''
            }, 3000);
        });
}
//تابع نمایش اررو های ولیدیشن
function createList(spacecrafts){
    var listView=document.createElement('ol');
    listView.style.cssText = 'padding: 1rem';
    for(var i=0;i<spacecrafts.length;i++)
    {
        var listViewItem=document.createElement('li');
        listViewItem.style.color = "red"
        listViewItem.appendChild(document.createTextNode(spacecrafts[i]));
        listView.appendChild(listViewItem);
    }
    return listView;
}
// بررسی شهر کد ملی
check_code_city = function (code) {
    let error = document.getElementById("errors2")
    axios.post(base_url + '/api/code/check/city', {
        code: persianJs(code).persianNumber()._str
    })
        .then(function (res) {
            error.style.color = 'green'
            error.textContent = res.data
            setTimeout(function() {
                error.textContent = ''
            }, 3000);
        })
        .catch(function (err) {
            error.appendChild(createList(err.response.data.errors.code));
            setTimeout(function() {
                error.textContent = ''
            }, 3000);
        });
}
