#!/usr/bin/env bash

echo "removing public css directory"
rm -rf public/css
echo "removing public js directory"
rm -rf public/js
echo "running webpack for production"
npm run production
echo "swapping gitignore"
mv .gitignore local-gitignore
mv fortrabbit-gitignore .gitignore
echo "creating commit"
git add --all
git commit -m "deploy to fortrabbit"
echo "push to fortrabbit"
git push fortrabbit master --no-verify
echo "removing public css directory"
rm -rf public/css
echo "removing public js directory"
rm -rf public/js
echo "running webpack for development"
npm run dev
echo "swapping gitignore"
mv .gitignore fortrabbit-gitignore
mv local-gitignore .gitignore
echo "creating commit"
git add --all
git commit -m "post fortrabbit deploy"
echo "pushing to github"
git push origin master
echo "finished"