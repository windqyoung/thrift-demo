namespace py api.service
namespace js Api.Service
namespace php Api.Service


include 'common.thrift'


/**
 * Response For Person
 */
struct PersonResponse {
    1: common.Status status
    2: common.Person data
}

struct PersonRequest {
    1: string name
}

struct AddResponse {
    1: common.Status status
    2: i32 result
}


service DemoService {
    PersonResponse getPerson(1: PersonRequest req)
    AddResponse add(1: i32 a, 2: i32 b)
}
