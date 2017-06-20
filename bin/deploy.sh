#bin/bash
SCRIPT_DIR="$(dirname "$0")"
APP_ROOT_DIR="$(cd "$SCRIPT_DIR/.." && pwd)"
cd ${APP_ROOT_DIR}/deploy
 ansible-playbook -i hosts enter.yml -e 'node=web role=knight' -t core,reload -vv