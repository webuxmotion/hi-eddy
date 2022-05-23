# clone repo
git clone https://github.com/webuxmotion/hi-eddy.git

# go to folder
cd hi-eddy

docker-compose up -d

composer install

npm i

cp .env.example .env