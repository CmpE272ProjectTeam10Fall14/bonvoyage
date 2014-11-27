<div id="fbody"><div class="container"><div id="ai_list" class="span12">
            <div class="span4 pull-left">
                <?php
                if (isset($_POST['submit'])){
                    $uploaddir = "story_upload/";
                    $repeat = 0; $succeed = 0; $failed = 0; $total = 0;
                    $files = Array();
                    $tmp = Array('name' => "",'type' => "",'size' => "",'error' => "",'tmp_name' => "");
                    $files[] = $tmp;

                    foreach($_FILES['_file']['name'] as $tmpname){
                        $files[$total]['name'] = $tmpname;
                        $files[$total]['type'] = $_FILES['_file']['type'][$total];
                        $files[$total]['size'] = $_FILES['_file']['size'][$total];
                        $files[$total]['error'] = $_FILES['_file']['error'][$total];
                        $files[$total]['tmp_name'] = $_FILES['_file']['tmp_name'][$total];
                        $total++;
                    }

                    for($i = 0; $i < $total; $i++){
                        $filename=$files[$i]['name'];
                        $filetype=$files[$i]["type"];
                        $filesize=$files[$i]["size"];

                        $md5_filename = $filename;

                        if (file_exists($uploaddir.$md5_filename)){
                            $repeat++;

                        }else{
                            $upstatus = move_uploaded_file(
                                $files[$i]["tmp_name"],
                                $uploaddir.$md5_filename
                            );
                            if ($upstatus != false){
                                $succeed++;

                            }else{
                                $failed++;

                            }
                        }
                    }
                }
                ?>
                <script>

                    function displayfiles(){
                        var files = document.getElementById("_file[]").files;
                        var display = "";
                        var n = files.length;
                        for(var i=0; i<n; i++) display += files[i].name + "<br>";
                        document.getElementById("disfiles").innerHTML = display;
                    }
                </script>
                    <div id="file">
                        <input type="file" multiple name="_file[]" id="_file[]" onchange="displayfiles()"/>
                    </div>

                <div id="disfiles">
                </div>

            </div>
        </div></div></div>