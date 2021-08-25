import sys

sys.path.append('gen-py')


from thrift import Thrift
from thrift.transport import THttpClient
from thrift.protocol import TJSONProtocol

from api.service import DemoService
from api.service.ttypes import PersonRequest
from api.common.constants import SERVICE_URI_PHPS

trans = THttpClient.THttpClient(SERVICE_URI_PHPS)

prot = TJSONProtocol.TJSONProtocol(trans)


client = DemoService.Client(prot)

req = PersonRequest("py name")
print(client.getPerson(req))

print(client.add(3, 5))
