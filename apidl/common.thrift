namespace py api.common
namespace js Api.Common
namespace php Api.Common


enum Code {
    ERROR = 10000
    OK = 20000
}

struct Status {
    1: i32 code
    2: string message
}

enum Gender {
    MALE = 1
    FEMALE
}

struct Person {
    1: string name
    2: i32 age
    3: Gender gender
}

const string SERVICE_URI_PHPS = 'http://localhost:9988/server.php?debug=1'
const string SERVICE_URI_WEB = 'server.php?debug=1'

