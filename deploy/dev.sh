#!/usr/bin/env bash
eval `ssh-agent -s`
ssh-add C:/Users/Admin/.ssh/id_rsa
./vendor/bin/dep deploy develop -vv
