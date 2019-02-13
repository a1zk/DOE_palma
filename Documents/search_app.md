# Search_app:0.1
---
#### How it's work:
It's a simple app only for demostrtion.
In our case we have DB with few Cities and Hotels.
##### Cities:
 - Kiev
 - Berlin
 - London
##### Hotels:
 - Ibis
 - Hilton
 - Radisson
 - Dnipro
 - Lanesborough

You can easy use one of this values, and will get result like:
###### Kiev -------> Ibis
###### ...
***
##### HA
In this lab I used Docker Swarm cluster and I few replics for HA.
![Search_app](https://github.com/a1zk/DOE_palma/blob/master/Documents/Search_app.jpg)

We have 3 replicas of web servers( for LB and Failover(if one container goes down) )
3 replicas of app and one db. ( in my case i don't have "write" operation in db).
All this services we can monitoring by ELK stack on port 81.
***
##### Improvements

- For CI/CD I'd create pipeline(Jenkinsfile) with all steps(Build Test Delivery/Deploy) for delivering my app to some staging (Dev, Stage, Prod), setup build hook for commit and some notification about build status.
- Auto-version update for Docker Images.
- Migration from Docker Swarm to Kubernetes.
- Improve ELK stack.
- Add Prometheus and Grafana monitoring.
