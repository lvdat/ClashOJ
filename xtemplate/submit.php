<!DOCTYPE html>
<html lang="vi">
    <head>
        <title>Test submission with Judge API</title>

        <meta charset="utf-8" />
        <meta http-equiv="cache-control" content="no-cache" />
        
        <!-- Font Awesome v5-->
        <script src="https://kit.fontawesome.com/805c912558.js" crossorigin="anonymous"></script>

        <!-- Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

        <!-- Theme for CodeMirror -->
        <link rel="stylesheet" href="/asset/codemirror/lib/codemirror.css" />
        <link rel="stylesheet" href="/asset/codemirror/theme/material.css" />
        <link rel="stylesheet" href="/asset/codemirror/theme/material-ocean.css" />
        <link rel="stylesheet" href="/asset/codemirror/theme/material-darker.css" />
        <link rel="stylesheet" href="/asset/codemirror/theme/monokai.css" />
        <link rel="stylesheet" href="/asset/codemirror/theme/darcula.css" />
        <link rel="stylesheet" href="/asset/codemirror/theme/dracula.css" />
        <link rel="stylesheet" href="/asset/codemirror/theme/eclipse.css" />
        <link rel="stylesheet" href="/asset/codemirror/theme/neat.css" />
        <link rel="stylesheet" href="/asset/codemirror/theme/neo.css" />
        <link rel="stylesheet" href="/asset/codemirror/theme/twilight.css" />

        <!-- Language for CodeMirror -->
        <script src="/asset/codemirror/lib/codemirror.js"></script>
        <script src="/asset/codemirror/mode/htmlmixed/htmlmixed.js"></script>
        <script src="/asset/codemirror/mode/xml/xml.js"></script>
        <script src="/asset/codemirror/mode/css/css.js"></script>
        <script src="/asset/codemirror/mode/javascript/javascript.js"></script>
        <script src="/asset/codemirror/mode/python/python.js"></script>
        <script src="/asset/codemirror/mode/clike/clike.js"></script>
        <script src="/asset/codemirror/mode/sql/sql.js"></script>
        <script src="/asset/codemirror/mode/swift/swift.js"></script>
        <script src="/asset/codemirror/mode/d/d.js"></script>
        <script src="/asset/codemirror/mode/lua/lua.js"></script>
        <script src="/asset/codemirror/mode/haskell/haskell.js"></script>
        <script src="/asset/codemirror/mode/go/go.js"></script>
        <script src="/asset/codemirror/mode/groovy/groovy.js"></script>
        <script src="/asset/codemirror/mode/fortran/fortran.js"></script>
        <script src="/asset/codemirror/mode/erlang/erlang.js"></script>
        <script src="/asset/codemirror/mode/clojure/clojure.js"></script>
        <script src="/asset/codemirror/mode/cobol/cobol.js"></script>
        <script src="/asset/codemirror/mode/octave/octave.js"></script>
        <script src="/asset/codemirror/mode/ruby/ruby.js"></script>
        <script src="/asset/codemirror/mode/php/php.js"></script>

        <!-- Addon for CodeMirror-->
        <script src="/asset/codemirror/addon/edit/closetag.js"></script>
        <script src="/asset/codemirror/addon/fold/xml-fold.js"></script>
        <script src="/asset/codemirror/addon/edit/closebrackets.js"></script>

        <!-- css for Main-->
        <link rel="stylesheet" href="/asset/main.css" />
    </head>
    <body>

        <div class="wrapper">
            <header class="page-header">
                <div class="back">
                    <b><i class="fas fa-arrow-left"></i></b>
                </div>
                <div class="head1" id="clash_name">
                    <b>CodeWars - Giao l??u l???p tr??nh 2022</b>
                </div>
                <div class="head2" id="play_timer">
                    <b>01:15:00</b>
                </div>
                <div class="head3" id="user_bar">
                    Le Van Dat
                </div>
            </header>
            
            <main class="page-main">
                <div class="problem">
                    <div class="problem-title">
                        <h2>Problem A: Hello World!</h2>
                    </div>

                    <h3>Submission</h3>
                    <p id="submission-working">B???n ch??a Submit!</p>
                    <div class="test-case">
                        <p id="ex-case">Example Case: <b style="color:green"><i class="fas fa-check" title="Accepted"></i></b> <b style="color:green"><i class="fas fa-check"></i></b></p>
                        <p id="hd-case">Hidden Case: <b style="color:green"><i class="fas fa-check"></i></b> <b style="color:green"><i class="fas fa-check"></i></b></p>
                    </div>

                    <h3>Problem</h3>
                    <p>T??m s??? l???n nh???t trong 3 s??? ???????c nh???p t??? b??n ph??m.</p>
                </div>
                <div class="submission">
<!--                     <div class="code_editor">
                        
                        <select id="lang" onchange="changeMode(this)" class="lang_selector">
                            <option disabled selected id="title_lang_selector">??ang t???i d??? li???u...</option>
                        </select>
                        <select id="theme" onchange="changeTheme(this)" class="theme_selector">
                            </select>
                        
                    </div> -->

                    <div class="code_editor">
                        <textarea id="code" placeholder="??ang t???i Code Editor..."></textarea>
                    </div>
                    <div class="submit_select">
                        <div class="editor_config__select_language">
                            <select id="lang" onchange="changeMode(this)" class="lang_selector" title="?????i ng??n ng???">
                                <option disabled selected id="title_lang_selector">??ang t???i d??? li???u...</option>
                            </select>
                            <span class="focus"></span>
                        </div>
                        <div class="editor_config__select_theme">
                            <select id="theme" onchange="changeTheme(this)" class="theme_selector" title="?????i giao di???n">
                                <option disabled selected id="title_theme_selector">??ang t???i d??? li???u...</option>
                            </select>
                        </div>
<!--                    <select id="lang" onchange="changeMode(this)" class="lang_selector">
                            <option disabled selected id="title_lang_selector">??ang t???i d??? li???u...</option>
                        </select>
                        <select id="theme" onchange="changeTheme(this)" class="theme_selector">
                            </select> -->
                        <div class="submit_button">
                            <button class="run_code_button" id="submit_code">Submit</button>
                        </div>
                    </div>
                </div>

            </main>
        </div>


        <!-- scipt for main load -->
        <script>const CLASH = "<?=CLASH?>";</script>
        <script src="/asset/API.js"></script>
        <script src="/asset/main.js"></script>
        <script src="/load/problem/<?=CLASH?>.js"></script>
    </body>

</html>