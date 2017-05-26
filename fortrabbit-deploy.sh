#!/usr/bin/env bash

npm run dev
mv .gitignore local-gitignore
mv fortrabbit-gitignore .gitignore
git add --all
git commit -m "deploy to fortrabbit"
git push fortrabbit master --no-verify
mv .gitignore fortrabbit-gitignore
mv local-gitignore .gitignore
git add --all
git commit -m "post fortrabbit deploy"
git push origin master