pipeline {
    agent any
    environment {
        DOCKER_IMAGE_NAME = "prindustry/wordpress"
    }

    options {

      disableConcurrentBuilds()
      timeout(time: 10, unit: 'MINUTES')
      buildDiscarder(logRotator(numToKeepStr: '10'))

    } // options

    parameters {

      string(name: 'SLACK_CHANNEL',
           description: 'Default Slack channel to send messages to',
           defaultValue: '#cicd-app')
    } // parameters

    environment {

      // Slack configuration
      SLACK_COLOR_DANGER  = '#E01563'
      SLACK_COLOR_INFO    = '#6ECADC'
      SLACK_COLOR_WARNING = '#FFC300'
      SLACK_COLOR_GOOD    = '#3EB991'

    } // environment

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
    }

    post {

      aborted {

        echo "Sending message to Slack"
        slackSend (color: "${env.SLACK_COLOR_WARNING}",
                   channel: "${params.SLACK_CHANNEL}",
                   message: "*ABORTED:* Job ${env.JOB_NAME} build ${env.BUILD_NUMBER} by ${env.USER_ID}\n More info at: ${env.BUILD_URL}")
      } // aborted

      failure {

        echo "Sending message to Slack"
        slackSend (color: "${env.SLACK_COLOR_DANGER}",
                 channel: "${params.SLACK_CHANNEL}",
                 message: "*FAILED:* Job ${env.JOB_NAME} build ${env.BUILD_NUMBER} by ${env.USER_ID}\n More info at: ${env.BUILD_URL}")
      } // failure

      success {
        echo "Sending message to Slack"
        slackSend (color: "${env.SLACK_COLOR_GOOD}",
                 channel: "${params.SLACK_CHANNEL}",
                 message: "*SUCCESS:* Job ${env.JOB_NAME} build ${env.BUILD_NUMBER} by ${env.USER_ID}\n More info at: ${env.BUILD_URL}")
      } // success

  } // post

}
