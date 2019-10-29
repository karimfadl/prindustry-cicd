pipeline {
    agent any
    environment {
        DOCKER_IMAGE_NAME = "prindustry/wordpress"
    }

    stages {
        stage('Build Docker Image') {
            when {
                branch 'development'
            }
            steps {
                script {
                    app = docker.build(DOCKER_IMAGE_NAME)
                    app.inside {
                        sh 'echo Hello, DevApp Wordpress!'
                    }
                }
            }
        }


        stage('Push Docker Image') {
            when {
                branch 'development'
            }
            steps {
                script {
                    docker.withRegistry('https://registry.hub.docker.com', 'docker_hub_login') {
                        app.push("${env.BUILD_NUMBER}")
                        app.push("latest")
                    }
                }
            }
        }


        stage('DeployToDevelopment') {
            when {
                branch 'development'
            }
            steps {
                kubernetesDeploy(
                    kubeconfigId: 'kubeconfig',
                    configs: 'devapp.yml',
                    enableConfigSubstitution: true
                )
            }
        }

    post { 
        always { 
            slackSend (color: colorCode, message: summary)
        }
    }
}
