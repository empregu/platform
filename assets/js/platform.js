function my_profile(){
    var my_profile = document.getElementById("my-profile");
    my_profile.style.backgroundColor = "rgb(255, 255, 255)";
    my_profile.style.color = "rgb(93, 93, 93)";
    var news = document.getElementById("news");
    news.style.backgroundColor = "rgb(222, 222, 222)";
    news.style.color = "rgb(171, 171, 171)";
    var my_projects = document.getElementById("my-projects");
    my_projects.style.backgroundColor = "rgb(222, 222, 222)";
    my_projects.style.color = "rgb(171, 171, 171)";
    var content = document.getElementById("content");
    content.src = "../../un/editarperfil";
    var button_plus = document.getElementById("plus");
    button_plus.style.display = "none";
    var new_blog = document.getElementById("new_blog");
    new_blog.style.display = "none";
    var new_project = document.getElementById("new_project");
    new_project.style.display = "none";
}

function news(){
    var my_profile = document.getElementById("my-profile");
    my_profile.style.backgroundColor = "rgb(222, 222, 222)";
    my_profile.style.color = "rgb(171, 171, 171)";
    var news = document.getElementById("news");
    news.style.backgroundColor = "rgb(255, 255, 255)";
    news.style.color = "rgb(93, 93, 93)";
    var my_projects = document.getElementById("my-projects");
    my_projects.style.backgroundColor = "rgb(222, 222, 222)";
    my_projects.style.color = "rgb(171, 171, 171)";
    var content = document.getElementById("content");
    content.src = "";
    var button_plus = document.getElementById("plus");
    button_plus.style.display = "block";
    var new_blog = document.getElementById("new_blog");
    new_blog.style.display = "block";
    var new_project = document.getElementById("new_project");
    new_project.style.display = "block";
}

function my_projects(){
    var my_profile = document.getElementById("my-profile");
    my_profile.style.backgroundColor = "rgb(222, 222, 222)";
    my_profile.style.color = "rgb(171, 171, 171)";
    var news = document.getElementById("news");
    news.style.backgroundColor = "rgb(222, 222, 222)";
    news.style.color = "rgb(171, 171, 171)";
    var my_projects = document.getElementById("my-projects");
    my_projects.style.backgroundColor = "rgb(255, 255, 255)";
    my_projects.style.color = "rgb(93, 93, 93)";
    var content = document.getElementById("content");
    content.src = "../../un/meusprojetos";
    var button_plus = document.getElementById("plus");
    button_plus.style.display = "block";
    var new_blog = document.getElementById("new_blog");
    new_blog.style.display = "block";
    var new_project = document.getElementById("new_project");
    new_project.style.display = "block";
}

function new_project(){
    var check_project = document.getElementById("check_project");
    var name_project = document.getElementById("name_project");
    if (check_project.checked == false){
        check_project.checked = true;
        name_project.style.transitionDuration = "0.5s";
        name_project.style.display = "block";
    }
    else{
        check_project.checked = false;
        name_project.style.transitionDuration = "0.5s";
        name_project.style.display = "none";
    }

}

function plus_menu(){
    var new_blog = document.getElementById("new_blog");
    var new_project = document.getElementById("new_project");
    var name_project = document.getElementById("name_project");
    var check_plus = document.getElementById("check_plus");
    var check_project = document.getElementById("check_project");
    var button_plus = document.getElementById("plus");
    if (check_plus.checked == false){
        check_plus.checked = true;
        button_plus.style.transitionDuration = "0.5s";
        button_plus.style.transform = "rotate(45deg)";
        button_plus.style.boxShadow = "0px 0px";
        new_blog.style.transitionDuration = "0.5s";
        new_blog.style.marginBottom = "5%";
        new_project.style.transitionDuration = "0.5s";
        new_project.style.marginBottom = "10%";
    }
    else{
        check_plus.checked = false;
        button_plus.style.transitionDuration = "0.5s";
        button_plus.style.transform = "rotate(0deg)";
        button_plus.style.boxShadow = "0px 0px rgba(0, 0, 0, .2)";
        new_blog.style.transitionDuration = "0.5s";
        new_blog.style.marginBottom = "0%";
        new_project.style.transitionDuration = "0.5s";
        new_project.style.marginBottom = "0%";
        if (check_project.checked == true){
            check_project.checked = false;
            name_project.style.transitionDuration = "0.5s";
            name_project.style.display = "none";
        }
    }
}