#!/bin/bash
echo ">>>>>>>> Build app container <<<<<<<"
echo
docker build -t app:0.1 Dockerfiles/app/.
echo
echo ">>>>>>> Build app_db container <<<<<<<"
docker build -t app_db:0.1 Dockerfiles/db/.
echo
echo ">>>>>>> Build webserver container <<<<<<<"
echo
docker build -t app_web:0.1 Dockerfiles/web_srv/.
echo
echo ">>>>>>> Run app :) <<<<<<<"
docker stack deploy --compose-file app.yml search_app
echo
sleep 15
echo ">>>>>>> Check app status <<<<<<<<"
docker stack services search_app
echo
echo ">>>>>>> Run ELK stack <<<<<<<"
echo
docker stack deploy -c elk.yml elk
echo
sleep 15
echo ">>>>>>> ELK status <<<<<<<"
echo
docker stack services elk
echo
echo 'app uprl -----> $server_name/index.php or IP/index.php'
echo 'ELK url ------> $server_name:81 or IP:81'
