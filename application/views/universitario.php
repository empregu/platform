<?php $this->load->view('header-plataforma', array("nome" => $nome, "nick" => $nick));?>
    <?php if ($this->session->usuario == $sessao) { ?>
        <img id="background" src="/assets/img/background.svg">        
    <section>
        <input type="checkbox" id="check_plus">
        <input type="checkbox" id="check_project">
        <button id="my-projects" onclick="my_projects();">MY PROJECTS</button><button id="news" onclick="news();">NEWS</button><button id="my-profile" onclick="my_profile();">MY PROFILE</button>
        <iframe id="content" src=""></iframe>
        <button id="new_project" onclick="new_project();"><img src="/assets/img/project.svg"></button>
        <button id="new_blog" onclick="plus_menu();"><img src="/assets/img/pencil.svg"></button>
        <button id="plus" onclick="plus_menu();"><img src="/assets/img/plus.svg"></button>
        <div id="name_project">
            <h1>New Project</h1>
            <form action="#" method="post" accept-charset="utf-8">
                <input type="text" name="nome_projeto" placeholder="Name of Project...">
                <input class="button" type="submit" name="submit" value="Ok"><button onclick="new_project()">Cancel</button>
            </form>
        </div>
    </section>

    
<?php if (isset($error)) {echo $error;} ?>
    <?php } ?>
<?php $this->load->view('footer.php');?>