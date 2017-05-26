#!/usr/bin/env bash

rm -rf public/css
rm -rf public/js
npm run production
mv .gitignore local-gitignore
mv fortrabbit-gitignore .gitignore
git add --all
git commit -m "deploy to fortrabbit"
git push fortrabbit master --no-verify
rm -rf public/css
rm -rf public/js
npm run dev
mv .gitignore fortrabbit-gitignore
mv local-gitignore .gitignore
git add --all
git commit -m "post fortrabbit deploy"
git push origin master