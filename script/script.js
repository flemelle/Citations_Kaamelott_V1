var windowWidth = window.innerWidth;
var windowHeight = window.innerHeight;
pageSize(windowWidth, windowHeight);
window.addEventListener('resize', function () {
    windowWidth = this.innerWidth;
    windowHeight = this.innerHeight;
    pageSize(windowWidth, windowHeight);
})
function pageSize(windowWidth, windowHeight) {
    //console.log('pageSize is running');
    //console.log(windowWidth, windowHeight);
   
    if (windowWidth > windowHeight) {
        if (windowWidth < 2560 && windowWidth > 1700) {
            modifySection('1200px');
            //console.log('Section size width : 1100');
        }
        else if (windowWidth < 1700 && windowWidth > 1500) {
            modifySection('1000px');
            //console.log('Section size width : 900');
        }
        else if (windowWidth < 1500 && windowWidth > 1200) {
            modifySection('900px');
            //console.log('Section size width : 800');
        }
        else if (windowWidth < 1200 && windowWidth > 900) {
            modifySection('900px');
            //console.log('Section size width : 700');
        } else {
            modifySection('1700px');
            //console.log('Section size width : 1200');
        }
    } else {
        modifySection('1700px');
        //console.log('windowWidth < windowHeight');
    }
}
function modifySection(sectionWidth) {
    var section = document.querySelectorAll("section");
    console.log(section);
    console.log('sectionWith :', sectionWidth);
    size = section.length;
    for (var i = 0; i < size; i++) {
        section[i].style.width = sectionWidth;
        //console.log(section[i], 'section[size].style.width :', section[i].style.width);
    }
}


function reload() {
    location.reload();
}