#!/bin/bash
cd $1
export HOME=$1 && soffice --headless --invisible --convert-to pdf $2
